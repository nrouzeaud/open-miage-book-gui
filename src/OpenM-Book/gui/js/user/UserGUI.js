function OpenM_Book_UserPageGUI(){
    this.fields = undefined;
    this.buttonModification = undefined;
    /*this.fieldFirstName = undefined;
    this.fieldLastName = undefined;*/
    this.div = undefined;
    
    this.display = function(enabled){
        cadre = $("#"+OpenM_Book_PagesGui.divParentId);
         
        if(enabled===true || enabled === undefined){             
                
            cadre.empty();
            cadre.addClass("row-fluid");
            //  this.div = $(document.createElement('div')).addClass("row-fluid");
            //  cadre.append(this.div);

            var span10 = $(document.createElement('div')).addClass("span10");
            var span2 = $(document.createElement('div')).addClass("span2");
            cadre.append(span10);
            cadre.append(span2);
                
                
            span2.append(this.buttonModification.content());
                
            span10.append(this.fields.content());
        //span10.append(this.fieldFirstName.content());
        //span10.append(this.fieldLastName.content());
                
                
        }else{
            cadre.empty();  
        }  
    }    
}

function OpenM_Book_UserButtonModificationGui(inModification){
    this.text = "Modifier";
    this.textSave = "Savegarder";
    this.style = 'btn-info btn-large btn-space';
    this.styleSave = 'btn-success btn-large';
    this.iconColor = "icon-white";
    this.iconColorSave =  "icon-white";
    this.iconStyle = "icon-pencil";
    this.iconStyleSave = "icon-ok";
    this.c = $(document.createElement('div'));
    this.a = $(document.createElement('a'));
    this.aSave = $(document.createElement('a'));
    this.click = undefined;
    this.clickSave = undefined;

    this.inModification = inModification;
     
    this.content = function(){
        this.c.empty();
        this.a = $(document.createElement('a'));
        this.a.addClass("btn "+this.style);                              
        var icon = $(document.createElement("i"))
        .addClass(this.iconColor + " " + this.iconStyle);
        this.a.append(icon)
        .append('&nbsp;'+this.text)
        .click(this.click)
        .removeClass("active");          
        this.c.append(this.a);
        
        if(this.inModification){
            this.a.addClass('active');
            this.aSave = $(document.createElement('a'));
            this.aSave.addClass("btn "+this.styleSave);
            var icon = $(document.createElement("i"))
            .addClass(this.iconColorSave + " " + this.iconStyleSave);
            this.aSave.append(icon)
            .append('&nbsp;'+this.textSave)
            .click(this.clickSave);
            
            this.c.append(this.aSave);
            
        }
        
        
        return this.c;
    }     
}

function OpenM_Book_UserFieldsGui(){
    this.c = $(document.createElement("div"));
    this.allFiels = new Array();
    
    this.content = function(){
        this.c.empty().addClass("row-fluid");
        //this.c =  $(document.createElement("div")).addClass("row-fluid");
        if (this.allFiels.length != 0){
            for(var i in this.allFiels){
                this.c.append(this.allFiels[i].content());
            }
        }
        
        
        return this.c ;
    }
    
    this.addField= function(field){
        this.allFiels.push(field);
    }
    
}

function OpenM_Book_UserFieldGui(user, field, inModification){
    this.user = user;
    this.field = field;
    this.inModification = inModification;
    this.fieldName = this.field;
    this.fieldValue = "";
    this.c = $(document.createElement("div"));
    this.input = undefined;
    
    
    this.content = function(){
        if (!this.inModification){
            //display
            this.c.empty();
            //this.c = $(document.createElement("div"));
            this.c.addClass("span2");
            this.c.addClass("user-field");
            var label = $(document.createElement("span"));
            label.text(this.fieldName + " :");
            this.c.append(label);
            this.c.append("<br>");
            var labelVal = $(document.createElement("span"));
            labelVal.text(this.fieldValue);
            this.c.append(labelVal);
            return this.c
        }else{
            //modif
            this.c.empty();
            // this.c = $(document.createElement("div"));
            this.c.addClass("span2");
            this.c.addClass("user-field");
            this.c.addClass("control-group");
            var label = $(document.createElement("label")).addClass("control-label");
            label.attr("for",this.fieldName)
            .text(this.fieldName);
            this.c.append(label);
            var div = $(document.createElement("div")).addClass("controls");
            this.input = $(document.createElement("input"))
            .attr("id",this.fieldName)
            .attr("type","text")
            .attr("placeholder",this.fieldName)
            .val(this.fieldValue)
            .addClass("input-small");
            div.append(this.input);
            this.c.append(div);
            
            //div.append(labelVal)
            //this.c.append(div);
            return this.c;
        }
    }
        
    this.getValue = function(){
        var val = "";
        if (this.input){
            val = this.input.val();
            this.fieldValue = val;
        }
        return val;
    }    
}