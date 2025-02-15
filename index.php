<?php
header('Content-Type: text/plain');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_phrase = $_POST['search_phrase'];
    $search_phrase = preg_replace("/[^a-zA-Z0-9\s]/", "", $search_phrase);
    $csv_filename = 'embeddings.csv'; // Hard-coded embedding file
    $top_n = 1; // Hard-coded top_n results

    $command = escapeshellcmd("python3 llm-python-search-file-embeddings.py $csv_filename '$search_phrase' $top_n");
    $output = shell_exec($command);
    $url = trim($output); // Assuming the output is a URL path
    echo $url;
}
?>
