<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
    background-color: rgb(189, 189, 92;
    padding: 3px;
    text-align: center;
    font-size: 35px;
    color: rgb(29, 21, 21);
}

/* Container for flexboxes */
section {
    display: -webkit-flex;
    display: flex;
}

/* Style the navigation menu */
nav {
    width: 30%;
    float: left;
    min-height: 500px;
    flex: 1;
    background: #ccc;
    padding: 20px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
    margin: 20px;
}

/* Style the content */
article {
    -webkit-flex: 3;
    -ms-flex: 3;
    flex: 3;
    background-color: #f1f1f1;
    padding: 10px;
}

/* Style the footer */
footer {
    background-color: rgb(189, 189, 92);
    padding: 2px;
    text-align: center;
    color: white;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
    section {
        -webkit-flex-direction: column;
        flex-direction: column;
    }
}
</style>