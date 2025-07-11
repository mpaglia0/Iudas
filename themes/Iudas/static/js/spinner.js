 document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector("#search-spinner").style.visibility = "visible";
    } else {
        document.querySelector("#search-spinner").style.visibility = "hidden";
        document.querySelector("#search-spinner").style.display = "none";
    }
};
