<div id="futures_list">
    <h2>Futures</h2>
    <table>
        <thead>
            <tr>
                <th colspan="2">#</th>
                <th>Futures Name</th>
                <th>Futures Description</th>
            </tr>
        </thead>
        <?php  
        if($future){
            $listnumb =0;
            foreach ($future as $k=>$fut){
                $listnumb++;?>
                <tr>
                    <td data-title=''><?php echo $listnumb ?></td>
                    <td data-title='Futures Name' data-index="futures_name"><?php echo $fut->futures_name ?></td>
                    <td data-title='Futures Description' data-index="futures_desc"><?php echo $fut->description ?></td>
                    <td data-index="id_futures" class="td_hidden"><?php echo $fut->id_futures ?></td>
                    <td data-index="futures_dec" class="td_hidden"><?php echo $fut->dec_places ?></td>
                </tr>
            <?php
            }
        }else {
            
        ?>
            <tr><td>No Futures Contracts in Database</td></tr>
        <?php
        }
        ?>
    </table>    
</div>