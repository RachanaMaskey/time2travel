
                
                        <div class="uk-width-4-5@m bto-right uk-flex-center btm-one-wrap ">
                            <div class="container uk-flex-center">
                                <h2 class="h1-light" style="text-align:center;color:#8c3838;max-width: 900px;">Lets explore and plan</h2>
                                <br>
                                <div style="display: flex; gap: 20px; align-items: flex-start; flex-wrap: wrap;">
                                    <div style="flex: 1; min-width: 250px;">
                                        <label for="place" style="color: #8c3838; font-size: 1rem;" class="h2-dark"><b>Place:</b></label>
                                        <input type="text" id="place" class="uk-form-large form-control shadow-sm">
                                    </div>
                                    <div style="flex: 1; min-width: 250px;">
                                        <label for="budget" style="color: #8c3838; font-size: 1rem;" class="h2-dark"><b>Budget:</b></label>
                                        <input type="text" id="budget" class="uk-form-large form-control shadow-sm">
                                    </div>
                                    <div style="flex: 1; min-width: 250px;">
                                        <label for="time" style="color: #8c3838; font-size: 1rem;" class="h2-dark"><b>Time:</b></label>
                                        <input type="text" id="time" class="uk-form-large form-control shadow-sm">
                                    </div>
                                </div>

                                <br>
                                <button style="background-color: #8c3838; margin: 0 auto; display: block;" class="btn-transparent hvr-sweep-to-top" onclick="generateResponse();">Generate Response</button>
                                <br>
                               

                                <div id="response"></div>

                                <script src="script.js"></script>
                            </div>
                        </div>





