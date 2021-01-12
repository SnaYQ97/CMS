<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url("assets/styles/css/style.min.css")?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <script src="<?=base_url("assets/scripts/js/index.min.js")?>"></script>
    <title>CMS - Success</title>
</head>
<body>
    <div class="success-container">
        <div class="photo-box">
            
        </div>
        <div class="success-box">
            <div class="card-box">
                <div class="header-box">
                    <div class="text">
                        Success
                        <br>
                        <?php 
                          echo 'Hello,';
                        ?>
                    </div>
                    <div class="text">
                        You will be transferred for a while.
                    </div>
                </div>
                <div>
                    <a style="text-decoration: none; font-size: 25px; color: #648DFF;" href="<?=base_url().'/logout'?>">Log out</a>
                </div>
            </div>
        </div> 
    </div>
</body>
</html>
