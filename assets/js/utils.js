/* --------------------------------------------------
 * jQuery plugins
 */
if(window.jQuery && window.jQuery.fn){
  jQuery.fn.tap = function(fn, else_fn){
    this.length !== 0 ? fn(this) : (else_fn && else_fn());
    return this;
  };
}

/* --------------------------------------------------
 * with_lock
 */
const with_lock = (() => {
  const locks = {};

  return (domain, fn) => {
    if(locks[domain]) return;
    locks[domain] = true;
    fn(function(){locks[domain] = false;});
  };
})();
