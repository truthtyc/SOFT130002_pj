function backPage() {
    if (!(localStorage.getItem("0title") === document.title)) {
        localStorage.setItem("2title", localStorage.getItem("1title"));
        localStorage.setItem("1title", localStorage.getItem("0title"));
        localStorage.setItem("0title", document.title);

        localStorage.setItem("2href", localStorage.getItem("1href"));
        localStorage.setItem("1href", localStorage.getItem("0href"));
        localStorage.setItem("0href", document.documentURI);
    } else if (localStorage.getItem("1title") === document.title) {
        let tmp = localStorage.getItem("0title");
        localStorage.setItem("0title", localStorage.getItem("1title"));
        localStorage.setItem("1title", tmp);
    }
}

function setFootprint() {
    for (let i = 0; i < 3; i++) {
        let keyTitle = i.toString() + "title";
        let keyHref = i.toString() + "href";
        let elemId = i.toString() + "footprint";
        if (localStorage.getItem(keyTitle) == null)
            document.getElementById(elemId).innerHTML = " ";
        else
            document.getElementById(elemId).innerHTML = localStorage.getItem(keyTitle);
        document.getElementById(elemId).setAttribute("href", localStorage.getItem(keyHref));
    }
}