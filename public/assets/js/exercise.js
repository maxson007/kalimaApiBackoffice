$(function() {
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    }

    function getUrlParam(parameter){
        var urlparameter = '';
        if(window.location.href.indexOf(parameter) > -1){
            urlparameter = getUrlVars()[parameter];
        }
        return urlparameter;
    }
    const entity = getUrlParam('entity');
    //console.log(entity);
    //colone de droite Proposition de reponse
    $("#new-exercise-form > div > div.field-group.col-4").hide();
    $("#edit-exercise-form > div > div.field-group.col-4").hide();

    //phraseTraduire inputt
    $("#new-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").hide();
    $("#edit-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").hide();

    //Liste de proposition de reponse
     $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").hide();
     $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").hide();

    //Liste de proposition de mot comorien
     $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").hide();
     $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").hide();
    //Liste de proposition de mot français
     $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").hide();
     $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").hide();

     //onready check value
    hideShowPropositionResponse();

    $("#exercise_exerciseType").on('change',function (e) {
        hideShowPropositionResponse()
    });

});

function hideShowPropositionResponse(){
    var exerciceType=$("#exercise_exerciseType").val();
    $("#new-exercise-form > div > div.field-group.col-4").show();
    $("#edit-exercise-form > div > div.field-group.col-4").show();
    if(exerciceType==='chooseExactTranslation'){
        //phraseTraduire affiche
        $("#new-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").show();
        $("#edit-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").show();
        //listeProposition affiche
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").show();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").show();
        //Le reste invisible
        //Liste de proposition de mot comorien
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").hide();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").hide();
        //Liste de proposition de mot français
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").hide();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").hide();
    } else if(exerciceType==='translatesSentence'){
        //phraseTraduire affiche
        $("#new-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").show();
        $("#edit-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").show();
        //listeProposition affiche
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").show();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").show();
        //Le reste invisible
        //Liste de proposition de mot comorien
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").hide();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").hide();
        //Liste de proposition de mot français
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").hide();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").hide();
    } else if(exerciceType==='traductionPaires'){
        //Liste de proposition de mot comorien affiche
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").show();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(2)").show();
        //Liste de proposition de mot français affiche
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").show();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(3)").show();

        //Le reste invisible
        //phraseTraduire inputt
        $("#new-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").hide();
        $("#edit-exercise-form > div > div:nth-child(1) > fieldset > div > div:nth-child(4)").hide();

        //Liste de proposition de reponse
        $("#new-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").hide();
        $("#edit-exercise-form > div > div.field-group.col-4 > fieldset > div > div:nth-child(1)").hide();
    } else{
        //colone de droite Proposition de reponse
        $("#new-exercise-form > div > div.field-group.col-4").hide();
        $("#edit-exercise-form > div > div.field-group.col-4").hide();
    }
}