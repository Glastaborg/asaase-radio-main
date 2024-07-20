<form class="column is-full" action="" method="POST" enctype="multipart/form-data">
    <div class="table-container">
        <table class="table is-fullwidth is-bordered">
        <tbody>
            <tr>
                <td width="400px">
                    <div class="field">
                    <label class="label">Summary of Identified Gap(s) (Technical and/or Behavioural): <span class="has-text-danger">*</span></label>
                    <input type="text"  name="perf_id" value="<?php echo $perf_id;?>" required hidden/>
                    <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                        <textarea style="min-height:40px;"  name="sum_of_id" rows="5" placeholder="Enter Summary of Identified" id="sum_of_id" ></textarea>
                    </div>
                    </div>
                </td>
                <td width="400px">
                    <div class="field">
                    <label class="label">Development Support Needed: (Please indicate how support will be provided) <span class="has-text-danger">*</span></label>
                    <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                        <textarea style="min-height:40px; "  name="dev_sup_need" rows="5" placeholder="Enter Development Support Needed" id="dev_sup_need" ></textarea>
                    </div>
                    </div>
                </td>
            </tr>          
            <tr>
                <td  colspan="5" class="has-text-right">
                    <button class="button is-info" name="add_part_c">
                    &nbsp; Save &nbsp;
                    </button>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</form>