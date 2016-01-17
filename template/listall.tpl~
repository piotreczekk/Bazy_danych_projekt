<!-- Szablon odpowiadający za wyświetlanie danych odczytywanych z tabeli z bazy danych -->

<table border="1">
 <?php 
     if ($data) {
    $keys = array();
    foreach (array_values($data)[0] as $key => $value) {
        if (!is_numeric($key))
            array_push($keys, $key);
    }
    echo '<tr>';
    foreach ($keys as $key)
        echo '<th>' . $key . '</th>';
    echo '</tr>';
    foreach ($data as $record) {
        echo '<tr>';
        foreach ($keys as $key)
            echo '<td>' . $record[$key] . '</td>';
        echo '</tr>';
    }
}
 ?> 
</table>

