<script src="public/js/games/mygames.js"></script>

<a href="index.php?r=games&p=newGame" class="btn btn-success mt-2 mb-2 float-right"><span class="oi oi-plus"></span> <b>Nouvelle partie</b></a>
<table id="table_games" class="table">
    <thead>
        <tr>
        <th>Date</th>
        <th>Nom</th>
        <th>Lieu</th>
        <th>Participants</th>
        <th>Actions</th>
        </tr>
    </thead>
</table>

<!-- Template des actions -->
<script id="template-actions" type="x-tmpl-mustache">
    <button class="btn btn-success"><span class="oi oi-brush"></span></button>
</script>
