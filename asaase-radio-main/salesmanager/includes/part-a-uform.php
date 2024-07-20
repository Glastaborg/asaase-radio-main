<form class="column is-full" action="assets/part-a-back.php" method="POST" enctype="multipart/form-data">
    <div class="table-container">
        <table class="table is-fullwidth is-bordered">
        <tbody>
            <tr>
            <td>
                <div class="field">
                <label class="label"> Key Area <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text"  name="part_a_id" value="<?php echo $data['part_a_id'];?>" required hidden/>
                    <input type="text" class="input" name="key_results" value="<?php echo $data['key_results']; ?>" required />
                </div>
                </div>
                <div class="field">
                <label class="label"> Weighting <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_a_w" value="<?php echo $data['part_a_w']; ?>" required />
                </div>
                </div>
                <div class="field">
                <label class="label"> Weighted Score <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_a_ws" value="<?php echo $data['part_a_ws']; ?>" required />
                </div>
                </div>
            </td>
            <td width="400px">
                <div class="field">
                <label class="label">Target Description <span class="has-text-danger">*</span></label>
                <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                    <textarea style="min-height:40px;"  name="target_desc" rows="5" placeholder="Enter request" id="target_desc" ><?php echo $data['target_desc']; ?></textarea>
                </div>
                </div>
            </td>
            <td width="400px">
                <div class="field">
                <label class="label">Outcome Description <span class="has-text-danger">*</span></label>
                <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                    <textarea style="min-height:40px; "  name="outcome_desc" rows="5" placeholder="Enter request" id="outcome_desc" ><?php echo $data['outcome_desc']; ?></textarea>
                </div>
                </div>
            </td>
            <td width="200px">
                <div class="field">
                <label class="label"> Rating <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_a_rating" value="<?php echo $data['part_a_rating']; ?>" required />
                </div>
                </div>
            </td>
            <td width="200px">
                <div class="field">
                <label class="label"> Actual Score <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_a_act_score" value="<?php echo $data['part_a_act_score']; ?>" required />
                </div>
                </div>
            </td>
            </tr>
            <tr>
            <td  colspan="5" class="has-text-right">
                <button class="button is-info" name="update_part_a">
                &nbsp; Update &nbsp;
                </button>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
</form>