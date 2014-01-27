
<div id="form">
<div>
    <span style="display: inline-block;width: 200px;">
        Select Committee
    </span>
    <span style="display: inline-block;">
        <select id="committee" name="commitee" style="width: 100px;">
            <option value="0"></option>
            <?php
            foreach ($this->data['committees'] as $committee)
            {?>
                <option value="<?php echo $committee['id']; ?>">
                    <?php echo $committee['name']; ?>
                </option>
            <?php
            }?>
        </select>
    </span>
</div>
<div id="membersSection" style="display: none;">
    <span style="display: inline-block;width: 200px;vertical-align: top;">
        Select Committee Members
    </span>
    <span id="members" name="members" style="display: inline-block;vertical-align: top;">
        
    </span>
</div>
<div>
    <span style="display: inline-block;width: 200px;vertical-align: top;">
        Length
    </span>
    <span style="display: inline-block;vertical-align: top;">
        <input id="length" name ="length" type="text" style="width:100px;"/>
    </span>
</div>
<div>
    <span style="display: inline-block;width: 200px;vertical-align: top;">
        Name
    </span>
    <span style="display: inline-block;vertical-align: top;">
        <input id="name" name ="name" type="text" style="width:100px;"
               />
    </span>
</div>
<div>
    <span style="display: inline-block;width: 200px;vertical-align: top;">
        Description
    </span>
    <span style="display: inline-block;vertical-align: top;">
        <textarea id="description" name ="description" style="width:200px;" rows="5"
                  ></textarea>
    </span>
</div>
<div>
    <button id="search">Search</button>
</div>
</div>

<div id="calendarSection" style="display: none;">
    
    <div id='calendar'></div>
    <br/>
    <button id="searchAgain">Search</button>
</div>