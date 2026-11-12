<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>AcolheMind - Login</title>
    </head>
    <body style="font-family: 'Times New Roman', Times, serif; display: flex; justify-content: center; margin-top: 100px;">
        <div style="border 2px solid #ccc; padding: 10px; border-radius: 5px; width: 300px;">
            <h3>AcolheMind Portal</h3>
            <?php if(isset($erro)) echo"<p style='color:red'>$erro</p>"; ?>
            <form action="/portal" method="POST">
                <label>E-mail:</label><br><input type="email" name="email" required style="width:100%; font-family: 'Times New Roman', Times, serif;"><br><br>
                <label>Senha::</label><br><input type="password" name="senha" required style="width:100%; font-family: 'Times New Roman', Times, serif;"><br><br>
                <button type="submit" style="width:1 00%; font-family: 'Times New Roman', Times, serif;">Entrar</button>
</form>
        </div>
    </body>
</html>