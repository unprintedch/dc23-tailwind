window.addEventListener('load', function () {

    const tabsTitleFirstLevel = document.querySelectorAll(".tabs.first-level > .tabs-title");
    const tabsTitleSecondLevel = document.querySelectorAll(".tabs.second-level > .tabs-title");

    function toggleShowFirstLevel() {
        const target = this;
        const allTabsTitle = document.querySelectorAll(".tabs.first-level > .tabs-title");
        const allTabsPanel = document.querySelectorAll(".tabs-content.first-level > .tabs-panel");
        const tabNumber = target.getAttribute("tab_number");
        const tabPanel = document.getElementById("panel"+tabNumber);

        allTabsTitle.forEach(function(tabTitle){
            tabTitle.classList.remove("is-active");
        });
        allTabsPanel.forEach(function(tabPanel){
            tabPanel.classList.remove("is-active");
        });
        target.classList.add("is-active");
        tabPanel.classList.add("is-active");
    }

    function toggleShowSecondLevel() {
        const target = this;
        const tabNumber = target.getAttribute("tab_number");
        const tabPanelNumber = tabNumber.slice(0, -2);
        const tabPanel = document.getElementById("panel"+tabNumber);
        const allTabsTitle = document.querySelectorAll('.tabs.second-level > .tabs-title[tab_number*="'+tabPanelNumber+'-"]');
        const allTabsPanel = document.querySelectorAll('.tabs-content.second-level > .tabs-panel[id*="'+tabPanelNumber+'-"]');

        console.log("tabNumber:");
        console.log(tabNumber);

        console.log("tabPanelNumber:");
        console.log(tabPanelNumber);

        console.log("allTabsPanel:");
        console.log(allTabsPanel);

        allTabsTitle.forEach(function(tabTitle){
            tabTitle.classList.remove("is-active");
        });
        target.classList.add("is-active");

        allTabsPanel.forEach(function(tabPanel){
            tabPanel.classList.remove("is-active");
        });
        tabPanel.classList.add("is-active");
    }

    tabsTitleFirstLevel.forEach(function(tab) {
        tab.addEventListener("click", toggleShowFirstLevel);
    });
    tabsTitleSecondLevel.forEach(function(tab) {
        tab.addEventListener("click", toggleShowSecondLevel);
    });

});