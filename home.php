<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skripsian</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        @import url("https://fonts.googleapis.com/css?family=DM+Sans:500,700&display=swap");

        * {
            box-sizing: border-box;
        }

        body {
            text-align: center;
            display: flex;

            justify-content: center;
            align-items: center;
            padding: 0 20px;
            background-color: #000000;
        }

        .nav {
            display: inline-flex;
            position: relative;
            overflow: hidden;
            max-width: 100%;
            background-color: #fff;
            padding: 0 20px;
            border-radius: 40px;
            box-shadow: 0 10px 40px rgba(159, 162, 177, 0.8);
        }

        .nav-item {
            color: #83818c;
            padding: 20px;
            text-decoration: none;
            transition: 0.3s;
            margin: 0 6px;
            z-index: 1;
            font-family: "DM Sans", sans-serif;
            font-weight: 500;
            position: relative;
        }

        .nav-item:before {
            content: "";
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: #dfe2ea;
            border-radius: 8px 8px 0 0;
            opacity: 0;
            transition: 0.3s;
        }

        .nav-item:not(.is-active):hover:before {
            opacity: 1;
            bottom: 0;
        }

        .nav-item:not(.is-active):hover {
            color: #333;
        }

        .nav-indicator {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            transition: 0.4s;
            height: 5px;
            z-index: 1;
            border-radius: 8px 8px 0 0;
        }

        @media (max-width: 580px) {
            .nav {
                overflow: auto;
            }
        }

        #shutdown-toggle {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 999;
            /* Z-index untuk memastikan tampil di atas elemen lain jika ada */
            color: red;
            /* Warna teks */
            
            /* Warna latar belakang */
            
            /* Padding */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 30px;
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Efek transisi saat hover */
        }

        #shutdown-toggle:hover {
            background-color: #c0392b;
            /* Warna latar belakang saat hover */
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* Gaya latar belakang semi-transparan */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <nav class="nav">
        <a href="profil.php" class="nav-item" active-color="orange">profil</a>
        <a href="skripsi.php" class="nav-item" active-color="green">skripsi</a>

        <a href="#" class="nav-item" active-color="red">Blog</a>
        <a href="#" class="nav-item" active-color="rebeccapurple">Contact</a>
        <span class="nav-indicator"></span>
    </nav>
    
    <a href="login.php" class="nav-button" id="shutdown-toggle"><i class="fas fa-power-off"></i></a>
    <script>
        const indicator = document.querySelector('.nav-indicator');
        const items = document.querySelectorAll('.nav-item');

        function handleIndicator(el) {
            items.forEach(item => {
                item.classList.remove('is-active');
                item.removeAttribute('style');
            });

            indicator.style.width = `${el.offsetWidth}px`;
            indicator.style.left = `${el.offsetLeft}px`;
            indicator.style.backgroundColor = el.getAttribute('active-color');

            el.classList.add('is-active');
            el.style.color = el.getAttribute('active-color');
        }


        items.forEach((item, index) => {
            item.addEventListener('click', e => { handleIndicator(e.target); });
            item.classList.contains('is-active') && handleIndicator(item);
        });
    </script>
</body>

</html>