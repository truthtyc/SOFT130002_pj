function deleteElem(elem, id) {
    if (confirm("Confirm deleting?")) {
        document.getElementById(elem.id).remove();
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                alert(xmlhttp.responseText);
            }
        };
        xmlhttp.open("GET", "delete.php?q=" + id);
        xmlhttp.send();
    }
}