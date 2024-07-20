<form class="column is-full" action="assets/part-b-back.php" method="POST" enctype="multipart/form-data">
    <div class="table-container">
        <table class="table is-fullwidth is-bordered">
        <tbody>
            <tr>
            <td>
                <div class="field">
                <label class="label"> Developmental Target <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text"  name="part_b_id" value="<?php echo $data['part_b_id'];?>" required hidden/>
                    <input type="text" class="input" name="dev_target" value="<?php echo $data['dev_target']; ?>" required />
                </div>
                </div>
                <div class="field">
                <label class="label"> Weighting <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_b_w" value="<?php echo $data['part_b_w']; ?>" required />
                </div>
                </div>
                <div class="field">
                <label class="label"> Weighted Score <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_b_ws" value="<?php echo $data['part_b_ws']; ?>" required />
                </div>
                </div>
            </td>
            <td width="400px">
                <div class="field">
                <label class="label">Developmental Target Definition <span class="has-text-danger">*</span></label>
                <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                    <textarea style="min-height:40px;"  name="dev_targ_def" rows="5" placeholder="Enter request" id="target_desc" ><?php echo $data['dev_targ_def']; ?></textarea>
                </div>
                </div>
            </td>
            <td width="400px">
                <div class="field">
                <label class="label">Assessment<span class="has-text-danger">*</span></label>
                <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                    <textarea style="min-height:40px; "  name="assestment" rows="5" placeholder="Enter request" id="outcome_desc" ><?php echo $data['assestment']; ?></textarea>
                </div>
                </div>
            </td>
            <td width="200px">
                <div class="field">
                <label class="label"> Rating <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_b_rating" value="<?php echo $data['part_b_rating']; ?>" required />
                </div>
                </div>
            </td>
            <td width="200px">
                <div class="field">
                <label class="label"> Actual Score <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_b_act_score" value="<?php echo $data['part_b_act_score']; ?>" required />
                </div>
                </div>
            </td>
            </tr>
            <tr>
            <td  colspan="5" class="has-text-right">
                <button class="button is-info" name="update_part_b">
                &nbsp; Update &nbsp;
                </button>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
</form>