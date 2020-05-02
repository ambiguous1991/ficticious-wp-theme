const search = () => {
    const searchToggleEventListener = event => {
        document.getElementById('search-overlay-container').classList.toggle('search-overlay--show');
    };

    const addSearchIcon = () => {
        const html = `<li id="search-toggle" class="menu-item nav-item"><a class="nav-link" href="#"><i class="fas fa-search"></i></a> </li>`;
        document
            .getElementById('menu-menu-glowne')
            .insertAdjacentHTML('beforeend', html);
    };

    const setupEventListeners = () => {
        document.getElementById('search-toggle').addEventListener('click', searchToggleEventListener);
    }

    addSearchIcon();
    setupEventListeners();
}

export default search();