<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Link</title>
    <style>
        body {
            height: 100vh;
        }

        body,
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        form>* {
            width: 100%;
            margin: 1em;
        }
    </style>
</head>

<body>
    <form class="form">
        <input type="text" placeholder="Título da página" class="input" required>
        <button type="submit">Gerar</button>
    </form>
    <input type="text" class="output" readonly>
    <script>
        function retira_acentos(str) {

            com_acento = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝŔÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŕ ";

            sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr ";
            novastr = "";
            for (i = 0; i < str.length; i++) {
                troca = false;
                for (a = 0; a < com_acento.length; a++) {
                    if (str.substr(i, 1) == com_acento.substr(a, 1)) {
                        novastr += sem_acento.substr(a, 1);
                        troca = true;
                        break;
                    }
                }
                if (troca == false) {
                    novastr += str.substr(i, 1);
                }
            }
            novastr = novastr.replaceAll("(", "");
            novastr = novastr.replaceAll(")", "");
            novastr = novastr.replaceAll("-e-", "-");
            novastr = novastr.replaceAll("-da-", "-");
            novastr = novastr.replaceAll("-de-", "-");
            novastr = novastr.replaceAll("-do-", "-");
            novastr = novastr.replaceAll("-com-", "-");
            novastr = novastr.replaceAll("-~-", "-");
            novastr = novastr.replaceAll("~", "");
            novastr = novastr.replaceAll("/", "");
            novastr = novastr.replaceAll(",", "");
            novastr = novastr.replaceAll("&", "");
            novastr = novastr.replaceAll("--", "-");
            return novastr;
        }
        document.querySelector('.input').addEventListener('input', () => {
            document.querySelector('.output').value = "";
        })
        document.querySelector(".form").addEventListener('submit', (e) => {
            e.preventDefault();
            let value = document.querySelector('.input').value;
            value = retira_acentos(value.toLowerCase().split(" ").join("-"));
            let input = value;
            document.querySelector('.output').value = input;
            document.querySelector('.output').select();
            document.execCommand('copy');
            document.querySelector('.input').value = "";
        })
        document.querySelector('.input').focus()
    </script>
</body>