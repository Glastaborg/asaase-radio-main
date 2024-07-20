<form class="column is-full" action="" method="POST" enctype="multipart/form-data">
    <div class="table-container">
        <table class="table is-fullwidth is-bordered">
        <tbody>
            <tr>
            <td>
                <div class="field">
                <label class="label"> Developmental Target <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text"  name="perf_id" value="<?php echo $perf_id;?>" required hidden/>
                    <input type="text" class="input" name="dev_target" placeholder="Enter Key Results Area" required />
                </div>
                </div>
                <div class="field">
                <label class="label"> Weighting <span class="has-text-danger">*</span></label>
                <div class="control">
                    <input type="text" class="input" name="part_b_w" placeholder="Enter Weighting" required />
                </div>
                </div>
                <div class="field">
                <label class="label"> Weighted Score </label>
                <div class="control">
                    <input type="text" class="input" name="part_b_ws" placeholder="Enter Weighted Score" disabled />
                </div>
                </div>
            </td>
            <td width="400px">
                <div class="field">
                <label class="label">Developmental Target Definition <span class="has-text-danger">*</span></label>
                <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                    <textarea style="min-height:40px;"  name="dev_targ_def" rows="5" placeholder="Enter Developmental Target Definition" id="dev_targ_def" ></textarea>
                </div>
                </div>
            </td>
            <td width="400px">
                <div class="field">
                <label class="label">Assessment <span class="has-text-danger">*</span></label>
                <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                    <textarea style="min-height:40px; "  name="assestment" rows="5" placeholder="Enter Assessment" id="assestment" ></textarea>
                </div>
                </div>
            </td>
            <td width="200px">
                <div class="field">
                <label class="label"> Rating </label>
                <div class="control">
                    <input type="text" class="input" name="part_b_rating" placeholder="Enter Rating" disabled />
                </div>
                </div>
            </td>
            <td width="200px">
                <div class="field">
                <label class="label"> Actual Score</label>
                <div class="control">
                    <input type="text" class="input" name="part_b_act_score" placeholder="Enter Actual Score" disabled />
                </div>
                </div>
            </td>
            </tr>
            <tr>
            <td  colspan="5" class="has-text-right">
                <button class="button is-info" name="add_part_b">
                &nbsp; Save &nbsp;
                </button>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
</form>