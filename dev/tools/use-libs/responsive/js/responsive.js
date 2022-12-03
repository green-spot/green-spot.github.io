const buildWidthMediaQuery = (min, max) => {
  let media = `(min-width: ${min}px)`;
  if(max !== null) media += ` and (max-width: ${max}px)`;
  return media;
};

const matchWidthMediaQuery = (min, max) => {
  return window.matchMedia(buildWidthMediaQuery(min, max)).matches;
}

const responsive = (() => {
  const sets = [];

  window.addEventListener("resize", () => {
    sets.forEach((set, key) => {
      const widthQuery = window.matchMedia(set.media);

      if(widthQuery.matches){
        set.fn(!set.prevMatch);
      }
      set.prevMatch = widthQuery.matches;
    });
  }, false);

  return (min, max, fn) => {
    sets.push({
      media: buildWidthMediaQuery(min, max),
      fn: fn,
      prevMatch: false
    });
  };
})();

responsive.fire = () => window.dispatchEvent(new Event("resize"));
