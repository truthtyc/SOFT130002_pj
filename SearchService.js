function searchService() {
    let content = document.getElementById("search").value;
    console.log(content);
    self.location = "Search.php?search=" + content + "&sort=";
}