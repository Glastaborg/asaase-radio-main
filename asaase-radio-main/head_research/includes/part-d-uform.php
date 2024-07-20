<form class="column is-full" action="assets/part-d-back.php" method="POST" enctype="multipart/form-data">
    <div class="table-container">
        <table class="table is-fullwidth is-bordered">
        <tbody>
            <tr>
                <td>Total Score- Target: <span class="has-text-danger">*</span></td>
                <td>
                    <div class="field">
                        <div class="control">
                            <input type="text"  name="part_d_id" value="<?php echo $data['part_d_id'];?>" required hidden/>
                            <input type="text" class="input" name="ts_target" value="<?php echo $data['ts_target'];?>" required />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Total Score- Job Fundamental: <span class="has-text-danger">*</span></td>
                <td>
                    <div class="field">
                        <div class="control">
                            <input type="text" class="input" name="ts_job_fund" value="<?php echo $data['ts_job_fund'];?>" required />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Final Score-(Annual Targets+ Job Fundamentals)(Annual Review only) <span class="has-text-danger">*</span></td>
                <td>
                    <div class="field">
                        <div class="control">
                            <input type="text" class="input" name="final_score" value="<?php echo $data['final_score'];?>" required />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2"> 
                    <b>Final Rating <span class="has-text-danger">*</span></b> 
                    <p>
                    <div class="control">
                    <label class="radio">
                              <input type="radio" name="final_rating" value="5" <?php if ($data['final_rating'] == 5) { echo "checked"; } ; ?>>
                              5-CEE
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="4" <?php if ($data['final_rating'] == 4) { echo "checked"; } ; ?>>
                              4-EE
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="3" <?php if ($data['final_rating'] == 3) { echo "checked"; } ; ?>>
                              3-ME
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="2" <?php if ($data['final_rating'] == 2) { echo "checked"; } ; ?>>
                              2-PME
                          </label>
                          <label class="radio">
                              <input type="radio" name="final_rating" value="1" <?php if ($data['final_rating'] == 1) { echo "checked"; } ; ?>>
                              1-UP
                          </label>
                    </div>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="field">
                    <label class="label">Apraisee Comment <span class="has-text-danger">*</span></label>
                    <div class="control p-3" style="min-height:40px; border:1px solid #d5d5d5; border-radius:4px;">
                        <textarea style="min-height:40px; "  name="emp_comment" rows="5" placeholder="Enter Apraisee Comment" id="emp_comment" ><?php echo $data['emp_comment'];?></textarea>
                    </div>
                    </div>
                </td>
            </tr>          
            <tr>
                <td  colspan="2" class="has-text-right">
                    <button class="button is-info" name="update_part_d">
                    &nbsp; Update &nbsp;
                    </button>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</form>