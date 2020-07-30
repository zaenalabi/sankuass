<div class="container" >
        <div class="count-down-header">
            <span class="title-text">Count Form</span>
        </div>
        
        <div class="form">
        <form>
            
                <div><input type="number" id="countHour" placeholder="Enter Hour" max="12" min="0" required></div>
                <div><input type="number" id="countMin" placeholder="Enter Minutes" max="60" min="0" required></div>
                <div><input type="number" id="countSec" placeholder="Enter Second" max="60" min="0" required></div>
                <div><input type="submit" id="submitBtn" value="Begin Countdown"></div>
                <div><input type="submit" id="stopBtn" value="Stop Countdown"></div>
                <div><input type="submit" id="resetBtn" value="Reset Countdown"></div>
            
        </form>

        </div>
         <div id="demo" class="count-down">
            <span id="count-hour-value">00:</span>
            <span id="count-min-value">00:</span>
            <span id="count-second-value">00</span>
        </div>
    </div>
