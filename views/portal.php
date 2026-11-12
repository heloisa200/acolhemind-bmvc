<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>AcolheMind - DashBord</title>
    </head>
    <body style="font-family: 'Times New Roman', Times, serif; padding: 20px;">
        <div style="display: flex; justify-content: space-between;">
            <h2>Portal AcolheMind - Relatos Clínicos (READ)</h2>
           <a href="/portal/logout" style="color: red; font-weight: bold;">Sair</a>
</div>
<table border="1" cellpadding="10" style="width: 100%; border-collapse: collapse; font-family: 'Times New Roman', Times, serif;">
    <tr style="background: #eee;">
        <th>ID</th>
        <th>Paciente (Anonimizado)</th>
        <th>Simtomas & Gatilhos Encontrados</th>
</tr>
<?php foreach ($relatos as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><strong><?= htmlspecialchars($r['paciente_nome']) ?><strong></td>
        <td><?= htmlspecialchars($r['sintomas']) ?></td>
</tr>
<?php endforeach; ?>
</table>
    </body>
</html>