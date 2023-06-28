<?php
$staff = ["Admin" => [['nickname' => 'Pierre','role' => 'Admin', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Paule', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Jack', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]]], 'Staff/modo' => [['nickname' => 'Pierre', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Paule', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Jack', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]]], 'Developer' => [['nickname' => 'Pierre', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Paule', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Jack', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]]], 'Mapper' => [['nickname' => 'Pierre', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Paule', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Jack', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]]], 'Helper' => [['nickname' => 'Pierre', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Paule', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]], ['nickname' => 'Jack', "links" => [['youtube' => 'www.youtube.com'], ['twitch' => 'www.twitch.com']]]]];
?>
    <main class="container-fluid text-center fs-4">
        <h1>L'ÉQUIPE</h1>
        <ul id="listRoles" class="list-group list-group-horizontal d-inline-flex mx-auto my-5">
            <li class='list-group-item '>Tous</li>
        </ul>
        <div class="container justify-content-evenly">
            <div id="staffDisplay" class="row">
            </div>
        </div>
    </main>


    <script>
        let staffArray = <?= json_encode($staff) ?>;
    </script>
<?php
