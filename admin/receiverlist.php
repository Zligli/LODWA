<form id="receiver_list_form" class="edit" method="post" action="processrec">
    <h2>Edit or add New</h2>
    <span id="rightspan">To edit receiver click on the table row</span><br>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>NA Number</th>
                <th>BA</th>
            </tr>
        </thead>
        <tr>
            <td><select id="type_id" name="type"><?php foreach ($type as $k=>$v){echo "<option value='".$v['id_receiver_type']."'>".$v['receiver_type']."</option>"; }?></select></td>
            <td><input id="first_name" name="first_name" type="text" value="" required="" placeholder="First Name"/></td>
            <td><input id="last_name" name="last_name" type="text" value="" required="" placeholder="Last Name"/></td>
            <td><input id="email" name="email" type="email" value="" required="" placeholder="Email"/></td>
            <td><input id="na_number" name="na_number" type="text" value="" required="" placeholder="NA Number"/></td>
            <td><select id="broker_acc" name="broker_acc"><option value="1">Yes</option><option value="0">No</option></select></td>
        </tr>
    </table>
    <input id="id_receiver" type="hidden" name="id_receiver" value=""/>    
    <input id="active" name="active" type="hidden" value=""/>
    <div id="bottom">
        <div id="bottom-left">
            <button id="reset" class="reset" type="reset" name="receiver-submit" value="reset">Clear</button>
            <button id="subs" class="delete" type="button" name="receiver-submit" value="subscribe" onclick="getVal(this)">Subscribe</button>
            <button id="unsubs" class="delete" type="button" name="receiver-submit" value="subscribe" onclick="getVal(this)">Unsubscribe</button>
            <button id="update" class="update" type="button" name="receiver-submit" value="update" onclick="getVal(this)">Update</button>
            <button id="new" type="button" name="receiver-submit" value="new" onclick="getVal(this)">New</button>
        </div>
    </div>
</form>
<script>           
    function getVal(obj) {
        document.getElementById("notice-confirm").value = obj.value;
        rec_action = obj.value;
    }
</script>