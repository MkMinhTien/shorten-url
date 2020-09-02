<?php
if (isset($_POST['addurl']) && $_POST['addurl'] || isset($_POST['delurl']) && $_POST['delurl']) {
    include 'data/libs.php';
    $urls = loaddata('data/urls.txt');

    if (isset($_POST['server']) && $_POST['server']) {
        switch ($_POST['server']) {
            case 'Create':
                $add = them($_POST['addurl'], $urls, $url);

                if ($add) {
                    $addsave = save('data/urls.txt', $urls);
                    if ($addsave) {
                        $msg = message('URL saved successfully!') . '<br>';
                    } else {
                        $msg = message('Failed to save URL!', 'danger') . '<br>';
                    }

                    $msg .= message('URL added successfully!');
                } else {
                    $msg = message('URL added failed!', 'danger');
                }
                break;

            case 'Delete':
                $del = xoa($_POST['delurl'], $urls);

                if ($del) {
                    $delsave = save('data/urls.txt', $urls);
                    if ($delsave) {
                        $msg = message('URL saved successfully!') . '<br>';
                    } else {
                        $msg = message('Failed to save URL!', 'danger') . '<br>';
                    }
                    $msg .= message('URL deleted successfully!');
                } else {
                    $msg = message('URL deletion failed!', 'danger');
                }
                break;

            default:
                break;
        }
    }
}
