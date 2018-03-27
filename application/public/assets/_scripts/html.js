class Html {
    openTagString(tag,config){
        return "<"+tag+">";
    };
    closeTagString(tag){
        return "</"+tag+">";
        // jQuery('#updateModal').find('.modal-body').eq(0).html(data).modal('show');
    };
    createTag(tag){

    }
    createHtmlFromJSON(json){
        var output = '';
        var el = '';
        if(typeof json !== typeof undefined) {
            if(typeof json.tag !== typeof undefined) {
                el = document.createElement(json.tag);
                if(typeof json.children !== typeof undefined) {
                    for(var childElTag in json.children) {
                        var childEl = document.createElement(json.children[childElTag].tag);
                        if(typeof json.children[childElTag].text !== typeof undefined) {
                            childEl.appendChild(
                                document.createTextNode(json.children[childElTag].text)
                            );
                        }
                        el.appendChild(childEl)
                    }
                }
            }
        } else {
            return 'error';
        }

        return el;
    }
    toogleClass(ele, class1) {
        var classes = ele.className;
        var regex = new RegExp('\\b' + class1 + '\\b');
        var hasOne = classes.match(regex);
        class1 = class1.replace(/\s+/g, '');
        if (hasOne)
            ele.className = classes.replace(regex, '');
        else
            ele.className = classes + class1;
    }

}