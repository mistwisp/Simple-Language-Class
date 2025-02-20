<?php
    session_start();
    $SelectedLang = $_SESSION['Language'] ?? 'en';
    include('Language.class.php');
    $LangClass = new Language();
    if (isset($_POST['Lang']) && in_array($_POST['Lang'], $LangClass->GetAllLanguages())) 
    {
        $_SESSION['Language'] = $_POST['Lang'];
		$_POST = [];
		header("Location: " . $_SERVER["PHP_SELF"]);
		exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Language Class Example</title>
    </head>
    <body>
        <form method="POST">
            <select name="Lang" onchange="this.form.submit()">
                <?php foreach ($LangClass->GetAllLanguages() as $LangName): ?>
                    <option value="<?php echo $LangName; ?>" <?php echo ($SelectedLang == $LangName) ? 'selected' : ''; ?>>
                        <?php echo $LangName; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
        <h1><?php echo $LangClass->LanguageText( $SelectedLang, "demo" ); ?></h1>
    </body>
</html>
