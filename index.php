<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ТЗ на вакансию Программист PHP (часть первая)</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            display: flex;
            font-family: Arial, sans-serif;
            min-height: 100vh;
        }
        #themes,
        #subthemes {
            width: 20%;
            padding: 10px;
            border-right: 1px solid #ccc;
            background-color: #e3e2e2;
            max-width: 200px;
        }
        #subthemes {
            background-color: #fafafa;
        }
        #content {
            flex: 1;
            padding: 10px 20px;
        }
        .item {
            cursor: pointer;
            margin: 5px 0;
            padding: 5px;
            border-radius: 4px;
        }
        .item:hover {
            background-color: #b3aeae;
        }
        .active {
            background-color: #b0c4de;
        }
        /* Адаптивность для мобильных устройств */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            #themes,
            #subthemes,
            #content {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid #ccc;
                max-width: 100%;
                padding: 15px 20px;
            }
            #content {
                border-bottom: none;
            }
        }
    </style>
</head>

<body>
    <div id="themes"></div>
    <div id="subthemes"></div>
    <div id="content"></div>

    <script>
        const knowledgeBase = {
            "Тема 1": {
                "1.1": "Код реализации можно посмотреть тут <a href='https://github.com/zchk0/uchot-prosto-no-framework'>https://github.com/zchk0/uchot-prosto-no-framework</a>",
                "1.2": "Содержимое для Подтемы, здесь может быть совсем другой текст."
            },
            "Тема 2": {
                "2.1": "Содержимое для Подтемы.",
                "2.2": "тест тест.",
                "2.3": "еще подтема."
            }
        };
        const themesContainer = document.getElementById('themes');
        const subthemesContainer = document.getElementById('subthemes');
        const contentContainer = document.getElementById('content');
        let currentTheme = null;
        let currentSubtheme = null;

        function renderThemes() {
            themesContainer.innerHTML = '';
            Object.keys(knowledgeBase).forEach(themeName => {
                const themeElement = document.createElement('div');
                themeElement.textContent = themeName;
                themeElement.classList.add('item');
                themeElement.addEventListener('click', () => {
                    selectTheme(themeName);
                });
                if (themeName === currentTheme) {
                    themeElement.classList.add('active');
                }
                themesContainer.appendChild(themeElement);
            });
        }

        function renderSubthemes(themeName) {
            subthemesContainer.innerHTML = '';
            const subthemes = knowledgeBase[themeName];
            Object.keys(subthemes).forEach(subthemeName => {
                const subthemeElement = document.createElement('div');
                subthemeElement.textContent = 'Подтема ' + subthemeName;
                subthemeElement.classList.add('item');
                subthemeElement.addEventListener('click', () => {
                    selectSubtheme(subthemeName);
                });
                if (subthemeName === currentSubtheme) {
                    subthemeElement.classList.add('active');
                }
                subthemesContainer.appendChild(subthemeElement);
            });
        }

        function renderContent(themeName, subthemeName) {
            const text = knowledgeBase[themeName][subthemeName];
            contentContainer.innerHTML = `<h1>Содержимое для Подтемы ${subthemeName}</h1><br>` + text;
        }

        function selectTheme(themeName) {
            currentTheme = themeName;
            const firstSubtheme = Object.keys(knowledgeBase[themeName])[0];
            currentSubtheme = firstSubtheme;
            renderThemes();
            renderSubthemes(themeName);
            renderContent(themeName, firstSubtheme);
        }

        function selectSubtheme(subthemeName) {
            currentSubtheme = subthemeName;
            renderSubthemes(currentTheme);
            renderContent(currentTheme, currentSubtheme);
        }
        window.addEventListener('DOMContentLoaded', () => {
            currentTheme = 'Тема 1';
            currentSubtheme = '1.1';
            renderThemes();
            renderSubthemes(currentTheme);
            renderContent(currentTheme, currentSubtheme);
        });
    </script>
</body>
</html>