<?php
session_start();
if (!isset($_SESSION['e'])) $_SESSION['e'] = []; 

if (isset($_GET['s'])) {
    $key = strtolower($_GET['s']);
    $out = array_filter($_SESSION['e'], fn($v) => str_contains(strtolower($v['n']), $key));
    echo json_encode(array_values($out)); exit; 
}

if (isset($_POST['add'])) {
    if (empty($_POST['n']) || empty($_POST['u'])) echo "Fill all fields!";
    else $_SESSION['e'][$_POST['u']] = ['n'=>$_POST['n'], 'c'=>$_POST['c']]; 
}

if (isset($_GET['d'])) { unset($_SESSION['e'][$_GET['d']]); header("Location: final.php"); }
?>

<script>
function search(v) {
    fetch('final.php?s=' + v).then(r => r.json()).then(data => {
        let h = '<tr><th>Name</th><th>Company</th></tr>';
        data.forEach(i => h += `<tr><td>${i.n}</td><td>${i.c}</td></tr>`);
        document.getElementById('t').innerHTML = h; 
    });
}
</script>

<form method="post">
    Name: <input name="n"> Company: <input name="c"> User: <input name="u">
    <button name="add">Save</button>
</form>

<input placeholder="Search..." onkeyup="search(this.value)">

<table id="t" border="1">
    <?php foreach($_SESSION['e'] as $id => $v): ?>
    <tr>
        <td><?= $v['n'] ?></td><td><?= $v['c'] ?></td>
        <td><a href="?d=<?= $id ?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>