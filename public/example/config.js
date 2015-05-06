// You must define your own base url
window.__base_url = "../dist/js";
window.__app = {
    debug: 1,
    lang: "fr",
    menu: [
        {
            "name": "Dashboard",
            "ico": "fa-home",
            "link": "index.html"
        }
        ,{
            "name": "Installation",
            "ico": "fa-cogs",
            "link": "install.html"
        }
        ,{
            "name": "Login",
            "ico": "fa-power-off",
            "link": "login.html",
            "target": "_blank"
        }
        ,{
            "name": "Table",
            "ico": "fa-table",
            "link": "table.html"
        }
        ,{
            "name": "Test",
            "ico": "fa-table",
            "link": "#test"
        }
        ,{
            "name": "Reportings",
            "ico": "fa-signal",
            "link": "reporting.html",
            'children' : [
                {
                    "name": "Flot chart",
                    "ico": "fa-home",
                    "link": "reporting.html"
                }
                ,{
                    "name": "Bar charts",
                    "ico": "fa-cogs",
                    "link": "reporting.html"
                }
            ]
        }
    ]
};