/*
ACCELA.initPage = () => {
  document.querySelector("body").classList.add("show")
};

ACCELA.movePage = (page, move)=> {
  move();
};
*/

ACCELA.changePageContent = (body, pageContent) => {
  body.innerHTML = "";
  body.appendChild(pageContent);
  if(window.hljs) hljs.highlightAll();
};


// scroll event
(() => {
  const html = document.querySelector("html");
  if(html === null) return;

  window.addEventListener("scroll", () => {
    document.querySelectorAll(".animate").forEach((value, key, parent) => {
      const o = value;
      if(o.offsetTop < html.scrollTop + html.clientHeight / 3){
        o.setAttribute("data-scrolled", "1");
      }
    })
  })
})()


// module
ACCELA.modules.accordionDl = (dl) => {
  dl.querySelectorAll(".services dl div dt").forEach(dt => {
		dt.addEventListener("click", () => {
			if(dt.parentElement !== null) dt.parentElement.classList.toggle("opened");
		});
	});
};

ACCELA.modules.bg = (bg) => {
  const canvas = bg.querySelector("canvas");
  const ctx = canvas?.getContext("2d");
  if(ctx === null) return;

  const rand = max => Math.floor(Math.random() * max)

  //ctx.fillStyle = "rgba(13, 168, 82, .02)";
  for(let i=0; i<80; i++){
    const top = rand(canvas.height + 20) - 10
    const left = rand(canvas.width + 20) - 10
    const circleSize = rand(30) + 5

    ctx.beginPath();
    ctx.fillStyle = `rgba(${0+rand(30)}, ${100+rand(100)}, ${50+rand(100)}, .02)`;
    ctx.arc(left - 10, top, circleSize, 0, 2 * Math.PI, false)
    ctx.fill();
    ctx.closePath();
  }
};

ACCELA.modules.inquiryForm = (form) => {
  (() => {
    const ResponseStatus = {
      success: "100",
      error: "0",
      nameEmptyError: "200",
      nameValidationError: "201",
      emailEmptyError: "202",
      emailValidationError: "203",
      messageEmptyError: "204",
      messageValidationError: "205",
    }

    const formUrl = "https://mail-form-miapdyvouq-dt.a.run.app/send-mail"
    if(form === null) return

    const showLoading = () => {
      (form.querySelector(".loading")).classList.add("show")
    }

    const hideSubmitButton = () => {
      (form.querySelector(".button button")).classList.add("hide")
    }

    const hideLoading = () => {
      (form.querySelector(".loading")).classList.remove("show")
    }

    const showSubmitButton = () => {
      (form.querySelector(".button button")).classList.remove("hide")
    }

    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      hideSubmitButton()
      showLoading()

      const formData = {
        name: form.querySelector("[name='name']").value || "",
        email: form.querySelector("[name='email']").value || "",
        message: form.querySelector("[name='message']").value || ""
      }

      const res = await fetch(formUrl, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {'Content-Type': 'application/json'},
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify(formData)
      })

      hideLoading();

      switch(await res.text()){
      case ResponseStatus.success:
        alert("送信が完了しました。")
        break;

      case ResponseStatus.error:
        alert("server error")
        break;

      case ResponseStatus.nameEmptyError:
        alert("名前が入力されていません。")
        showSubmitButton()
        break;

      case ResponseStatus.nameValidationError:
        alert("名前が不正です。")
        showSubmitButton()
        break;

      case ResponseStatus.emailEmptyError:
        alert("メールアドレスが入力されていません。")
        showSubmitButton()
        break;

      case ResponseStatus.emailValidationError:
        alert("メールアドレスが不正です。")
        showSubmitButton()
        break;

      case ResponseStatus.messageEmptyError:
        alert("お問い合わせ内容が入力されていません。")
        showSubmitButton()
        break;
      }
    })
  })();
};

ACCELA.modules.documentNav = (ul) => {
  const pages = JSON.parse(ul.getAttribute("data-pages"));
  const currentSlug = ul.getAttribute("data-current-slug");
  const isCurrent = currentSlug === "about";
  const lis = [`<li class="accela"><a href="/accela/"${isCurrent ? ' class="current"' : ''}>Accelaとは</a></li>`];

  Object.entries(pages).forEach(([slug, [title, type]]) => {
    const isCurrent = currentSlug === slug;
    lis.push(`<li class="${type}"><a href="/accela/${slug}/"${isCurrent ? ' class="current"' : ''}>${title}</a></li>`);
  });

  ul.innerHTML = lis.join("");
};

ACCELA.modules.documentNavToggle = (object) => {
  object.addEventListener("click", () => {
    const side = document.querySelector(".document-layout > nav");
    side.classList.toggle("opened");
  });
};

ACCELA.modules.documentDetail = async (object) => {
  const slug = object.getAttribute("data-slug");
  const res = await fetch(`/api/accela/${slug}.md`);
  object.innerHTML = await res.text();
  ACCELA.modules.unescapeMarkdown(object);
};
