<main class="container-fluid text-center fs-4">
    <h1>L'ÉQUIPE</h1>
    <ul id="listRoles" class="list-group list-group-horizontal d-inline-flex mx-auto my-5">
        <li onclick="displayTeam()" class='list-group-item '>Tous</li>
    </ul>
    <div class="container justify-content-evenly">
        <div id="staffDisplay" class="row">
        </div>
    </div>
</main>


<script>
    let staffArray = <?= json_encode($data->content) ?>;
</script>