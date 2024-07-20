<form class="column is-full" action="assets/part-d-back.php" method="POST" enctype="multipart/form-data">
    <div class="table-container">
        <table class="table is-fullwidth is-bordered">
        <tbody>
            <tr>
                <td colspan="2">
                    <div class="field">
                    <label class="label">Apraiser Comment <span class="has-text-danger">*</span></label>
                    <input type="text"  name="part_d_id" value="<?php echo $row['part_d_id'];?>" required hidden/>
                    <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                        <textarea style="min-height:40px; "  name="sup_comment" rows="5" placeholder="Enter Apraisee Comment" id="sup_comment" ></textarea>
                    </div>
                    </div>
                </td>
            </tr>          
            <tr>
                <td  colspan="2" class="has-text-right">
                    <button class="button is-info" name="sup_update">
                    &nbsp;Update &nbsp;
                    </button>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</form>