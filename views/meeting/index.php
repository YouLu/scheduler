<div class="section">
    <span style="font-size: larger; font-weight: bold;">Meetings</span>
    <span style="float: right;">
        <a href="/scheduler/meeting/createmeeting"class="topLinkButton">Create</a>
    </span>
</div>
<hr/>

<div class="section">
<?php
    foreach ($this->data['meetings'] as $meeting)
    {?>
        <div class="ui-corner-all meeting"
            ownerId="<?php echo $meeting['owner']['id']; ?>"
            employeeId="<?php echo Session::get('id'); ?>"
            >
            <div>
                <span><b>name: </b><?php echo $meeting['name']; ?></span>
                <span style="float: right;"><b>owner: </b><?php echo $meeting['owner']['name']; ?></span>
            </div>

            <b>description: </b><?php echo $meeting['description']; ?><br/>
            <b>start: </b><?php echo $meeting['start']; ?> <br/>
            <b>end: </b><?php echo $meeting['end']; ?> <br/>
            <b>participants: </b>
                <?php 
                $i=0;
                foreach ($meeting['members'] as $member) 
                {
                    if($i==0)
                    {
                        echo $member['name'];
                    }
                    else {
                        echo ', '.$member['name'];
                    }
                    $i++;
                }?>
        </div>
<?php
    }?>
</div>