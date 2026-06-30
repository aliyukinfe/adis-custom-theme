(function () {
  const toggle = document.querySelector(".menu-toggle");
  const navigation = document.querySelector(".main-navigation");
  const menu = document.getElementById("primary-menu");

  if (!toggle || !navigation || !menu) {
    return;
  }

  const closeMenu = () => {
    toggle.setAttribute("aria-expanded", "false");
    navigation.classList.remove("is-open");
  };

  toggle.addEventListener("click", () => {
    const expanded = toggle.getAttribute("aria-expanded") === "true";

    toggle.setAttribute("aria-expanded", String(!expanded));
    navigation.classList.toggle("is-open", !expanded);
  });

  menu.addEventListener("click", (event) => {
    if (event.target instanceof HTMLAnchorElement) {
      closeMenu();
    }
  });

  window.addEventListener("resize", () => {
    if (window.matchMedia("(min-width: 781px)").matches) {
      closeMenu();
    }
  });
})();
