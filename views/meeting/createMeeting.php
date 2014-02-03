<div class="section"
     <h3 style="font-size: larger; font-weight: bold;">Create Meeting</h3>
</div>
<hr/>

<div id="form">
<div class="section">
    <span style="display: inline-block;width: 200px; vertical-align: top;">
        Select Employees
    </span>
    <span style="display: inline-block; vertical-align: top;">
        <select id="employees" style="width: 100px;">
            <option value="0"></option>
            <?php
            foreach ($this->data['employees'] as $employees)
            {?>
                <option value="<?php echo $employees['id']; ?>">
                    <?php echo $employees['name']; ?>
                </option>
            <?php
            }?>
        </select>
        <div id="selectedEmployees">
            
        </div>
    </span>
    
</div>

<div class="section">
    <span style="display: inline-block;width: 200px;vertical-align: top;">
        Length
    </span>
    <span style="display: inline-block;vertical-align: top;">
        <input id="length" name ="length" type="text" style="width:100px;"/>
    </span>
</div>
<div class="section">
    <span style="display: inline-block;width: 200px;vertical-align: top;">
        Name
    </span>
    <span style="display: inline-block;vertical-align: top;">
        <input id="name" type="text" style="width:100px;"
               />
    </span>
</div>
<div class="section">
    <span style="display: inline-block;width: 200px;vertical-align: top;">
        Description
    </span>
    <span style="display: inline-block;vertical-align: top;">
        <textarea id="description" style="width:200px;" rows="5"
                  ></textarea>
    </span>
</div>
    
<hr/>
<div class="section">
    <button id="search">Search</button>
</div>
</div>

<div id="resultSection" style="display: none;" class="section">
    <hr/>
    <div id="results">
        

    </div>
</div>
<div id="createMeetingButtonSection" style="display: none;" class="section">
    <hr/>
<button id="createMeetingButton" >Create</button>
</div>

<div id="messageBox" title="">
    
</div>
