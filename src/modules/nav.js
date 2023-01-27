/**
 * When the user scrolls down from the top, adjust navbar, page and logo styling.
 */
function navAdjust() {
  const page = document.getElementById("page");
  const pagePadding = page.style.paddingTop;
  const nav = document.getElementById("navbar");
  window.onscroll = function () {
    if (
      document.body.scrollTop > 120 ||
      document.documentElement.scrollTop > 120
    ) {
      nav.style.padding = "0.4rem 0";
      nav.style.borderBottomWidth = "0.2rem";
      page.style.paddingTop = "0";
    } else {
      nav.style.padding = "1.25rem 0";
      nav.style.borderBottomWidth = "0.4rem";
      page.style.paddingTop = pagePadding;
    }
  };
}

/**
 * When the user clicks on the search buttons, focus the modal search bar.
 */
function searchFocus() {
  const searchField = document.querySelector('#search-modal .aws-search-form input[type="search"]');
  const searchBtns = document.querySelectorAll('button[id^="btn-search"]');
  searchBtns.forEach((button) => {
    button.addEventListener('click', () => {
      setTimeout(() => searchField.focus(), 800);
    });
  });
}

export { navAdjust, searchFocus };
