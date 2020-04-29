function search() {
    var title = $("#title_search").val();
    window.location.href = "http://localhost:8000/search/"+title;
    return false;
}
