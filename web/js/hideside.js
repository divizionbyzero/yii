if (document.querySelector(".site-index")!=null) {
    document.querySelector(".sidebar").setAttribute("style","display:none");
    document.querySelector(".content").setAttribute("style","margin-right:0")
}

if (document.querySelector(".content>a.btn-primary")) {
    document.querySelector(".content>a.btn-primary").setAttribute("style","display:none");
}
