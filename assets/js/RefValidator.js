class RefValidator {
    constructor(){
        this.configuration = null;
        this.errorConteiner = null;
    }
    /* 
        rules = {
            "name" : Nombre del campo(usado para identificar),
            "label" : compomente(opcional)
            "field" : componente(obligatorio),
            "rules" : "rule1|rule2|rule3",
            "errors" : {
                "rule1" : "message",
                "rule2" : "message",
                "rule3" : "message"
            }
        }
    */
    validation(errorConteiner) {
        let values = Object.assign({}, this.configuration)
        values = Object.values(values);
        let configuration2 = Object.assign({}, this.configuration)
        configuration2 = Object.values(configuration2);
        let cont = 0;
        let validatedFields = [];
        let status = true;
        /** recorre segun cuantos campos haya en "values" */
        
        for (let valor of configuration2) {
            let modifiedConfiguration = Object.assign({}, values);
            modifiedConfiguration = Object.values(modifiedConfiguration);
            let rule = valor['rules'];
            let ruleArray = rule.split('|');
            modifiedConfiguration[cont++]["rules"] = ruleArray;
            validatedFields.push(this.validate(valor));
            
        }

        

        errorConteiner.empty();
        for (let value of validatedFields) {
            for (let obj of value) {
                if (!obj["status"]) {
                    this.showError(values, obj, errorConteiner)
                    status = false;
                } else {
                    this.removeError(values, obj, errorConteiner)
                }
            }
        }

        return status;

    }

    validate(data) {
        let validatedFields = [];
        let res;
        let val;
        for (let rule of data['rules']) {
            switch (rule) {
                case 'required':
                    val = this.extractData(data['field']);
                    if (val == null || val == -1 || val === "") {
                        res = { "name": data['name'], "rule": "required", "errors": data["errors"]["required"], "status": false };

                    } else {
                        res = { "name": data['name'], "rule": "required", "errors": "", "status": true };
                    }
                    validatedFields.push(res);
                    break;
                case 'numeric':
                    val = this.extractData(data['field']);
                    if (!this.isNumeric(val)) {
                        res = { "name": data['name'], "rule": "numeric", "errors": data["errors"]["numeric"], "status": false };

                    } else {
                        res = { "name": data['name'], "rule": "numeric", "errors": data["errors"]["numeric"], "status": true };
                    }
                    validatedFields.push(res);
                    break;
            }
        }
        return validatedFields;
    }

    /* retorna el valor del elemento */
    extractData(element) {
        if (element[0].type == 'select-one') {
            return element.val()
        }
        if (element[0].type == 'textarea') {
            return element.val();
        }
    }

    showError(configuration, validatedField, errorConteiner) {
        for (let value of configuration) {
            if (value["name"] == validatedField["name"]) {
                errorConteiner.attr('hidden', false);

                if(errorConteiner.find('svg.svgvalid')['length'] == 0){
                    errorConteiner.append(`
                        <svg class="svgvalid" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        
                    `);
                }
                errorConteiner.append(`
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 mr-2" width="24" height="24" role="img"
                            aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            ${validatedField["errors"]}
                        </div>
                    </div>
                `);
                if (value['label'] != "" && !this.isObjEmpty(value['label']) ) {
                    if(value['label'].find("i.mdi.mdi-alert-circle.text-danger:first")[0] == undefined){
                        value['label'].append(`
                            <i class="mdi mdi-alert-circle text-danger"></i>
                        `);
                        value['field'].css('border', '1px solid');
                        value['field'].css('border-color', '#FE5678');
                    }               
                }
            }
        }
    }

    removeError(configuration, validatedField, errorConteiner){
        for (let value of configuration) {
            if (value["name"] == validatedField["name"]) {
                if (value['label'] != "" && !this.isObjEmpty(value['label']) ) {
                    if(value['label'].find("i.mdi.mdi-alert-circle.text-danger:first")[0] != undefined){
                        value['label'].find("i.mdi.mdi-alert-circle.text-danger:first").remove();
                    }
                    value['field'].css('border', '');
                    value['field'].css('border-color', '');
                }

            }
            
        }
    }

    isNumeric(val) {
        return /^-?\d+$/.test(val);
    }

    isObjEmpty(obj) {
        for (var prop in obj) {
            if (obj.hasOwnProperty(prop)) return false;
        }
        return true;
    }

}