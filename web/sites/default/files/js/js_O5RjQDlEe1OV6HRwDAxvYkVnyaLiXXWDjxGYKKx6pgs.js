/* @license MIT https://github.com/ludo/jquery-treetable/blob/3.2.0/MIT-LICENSE.txt */
(function($){var Node,Tree,methods;Node=(function(){function Node(row,tree,settings){var parentId;this.row=row;this.tree=tree;this.settings=settings;this.id=this.row.data(this.settings.nodeIdAttr);parentId=this.row.data(this.settings.parentIdAttr);if(parentId!=null&&parentId!=="")this.parentId=parentId;this.treeCell=$(this.row.children(this.settings.columnElType)[this.settings.column]);this.expander=$(this.settings.expanderTemplate);this.indenter=$(this.settings.indenterTemplate);this.children=[];this.initialized=false;this.treeCell.prepend(this.indenter);}Node.prototype.addChild=function(child){return this.children.push(child);};Node.prototype.ancestors=function(){var ancestors,node;node=this;ancestors=[];while(node=node.parentNode())ancestors.push(node);return ancestors;};Node.prototype.collapse=function(){if(this.collapsed())return this;this.row.removeClass("expanded").addClass("collapsed");this._hideChildren();this.expander.attr("title",this.settings.stringExpand);if(this.initialized&&this.settings.onNodeCollapse!=null)this.settings.onNodeCollapse.apply(this);return this;};Node.prototype.collapsed=function(){return this.row.hasClass("collapsed");};Node.prototype.expand=function(){if(this.expanded())return this;this.row.removeClass("collapsed").addClass("expanded");if(this.initialized&&this.settings.onNodeExpand!=null)this.settings.onNodeExpand.apply(this);if($(this.row).is(":visible"))this._showChildren();this.expander.attr("title",this.settings.stringCollapse);return this;};Node.prototype.expanded=function(){return this.row.hasClass("expanded");};Node.prototype.hide=function(){this._hideChildren();this.row.hide();return this;};Node.prototype.isBranchNode=function(){if(this.children.length>0||this.row.data(this.settings.branchAttr)===true)return true;else return false;};Node.prototype.updateBranchLeafClass=function(){this.row.removeClass('branch');this.row.removeClass('leaf');this.row.addClass(this.isBranchNode()?'branch':'leaf');};Node.prototype.level=function(){return this.ancestors().length;};Node.prototype.parentNode=function(){if(this.parentId!=null)return this.tree[this.parentId];else return null;};Node.prototype.removeChild=function(child){var i=$.inArray(child,this.children);return this.children.splice(i,1);};Node.prototype.render=function(){var handler,settings=this.settings,target;if(settings.expandable===true&&this.isBranchNode()){handler=function(e){$(this).parents("table").treetable("node",$(this).parents("tr").data(settings.nodeIdAttr)).toggle();return e.preventDefault();};this.indenter.html(this.expander);target=settings.clickableNodeNames===true?this.treeCell:this.expander;target.off("click.treetable").on("click.treetable",handler);target.off("keydown.treetable").on("keydown.treetable",function(e){if(e.keyCode==13)handler.apply(this,[e]);});}this.indenter[0].style.paddingLeft=""+(this.level()*settings.indent)+"px";return this;};Node.prototype.reveal=function(){if(this.parentId!=null)this.parentNode().reveal();return this.expand();};Node.prototype.setParent=function(node){if(this.parentId!=null)this.tree[this.parentId].removeChild(this);this.parentId=node.id;this.row.data(this.settings.parentIdAttr,node.id);return node.addChild(this);};Node.prototype.show=function(){if(!this.initialized)this._initialize();this.row.show();if(this.expanded())this._showChildren();return this;};Node.prototype.toggle=function(){if(this.expanded())this.collapse();else this.expand();return this;};Node.prototype._hideChildren=function(){var child,_i,_len,_ref,_results;_ref=this.children;_results=[];for(_i=0,_len=_ref.length;_i<_len;_i++){child=_ref[_i];_results.push(child.hide());}return _results;};Node.prototype._initialize=function(){var settings=this.settings;this.render();if(settings.expandable===true&&settings.initialState==="collapsed")this.collapse();else this.expand();if(settings.onNodeInitialized!=null)settings.onNodeInitialized.apply(this);return this.initialized=true;};Node.prototype._showChildren=function(){var child,_i,_len,_ref,_results;_ref=this.children;_results=[];for(_i=0,_len=_ref.length;_i<_len;_i++){child=_ref[_i];_results.push(child.show());}return _results;};return Node;})();Tree=(function(){function Tree(table,settings){this.table=table;this.settings=settings;this.tree={};this.nodes=[];this.roots=[];}Tree.prototype.collapseAll=function(){var node,_i,_len,_ref,_results;_ref=this.nodes;_results=[];for(_i=0,_len=_ref.length;_i<_len;_i++){node=_ref[_i];_results.push(node.collapse());}return _results;};Tree.prototype.expandAll=function(){var node,_i,_len,_ref,_results;_ref=this.nodes;_results=[];for(_i=0,_len=_ref.length;_i<_len;_i++){node=_ref[_i];_results.push(node.expand());}return _results;};Tree.prototype.findLastNode=function(node){if(node.children.length>0)return this.findLastNode(node.children[node.children.length-1]);else return node;};Tree.prototype.loadRows=function(rows){var node,row,i;if(rows!=null)for(i=0;i<rows.length;i++){row=$(rows[i]);if(row.data(this.settings.nodeIdAttr)!=null){node=new Node(row,this.tree,this.settings);this.nodes.push(node);this.tree[node.id]=node;if(node.parentId!=null&&this.tree[node.parentId])this.tree[node.parentId].addChild(node);else this.roots.push(node);}}for(i=0;i<this.nodes.length;i++)node=this.nodes[i].updateBranchLeafClass();return this;};Tree.prototype.move=function(node,destination){var nodeParent=node.parentNode();if(node!==destination&&destination.id!==node.parentId&&$.inArray(node,destination.ancestors())===-1){node.setParent(destination);this._moveRows(node,destination);if(node.parentNode().children.length===1)node.parentNode().render();}if(nodeParent)nodeParent.updateBranchLeafClass();if(node.parentNode())node.parentNode().updateBranchLeafClass();node.updateBranchLeafClass();return this;};Tree.prototype.removeNode=function(node){this.unloadBranch(node);node.row.remove();if(node.parentId!=null)node.parentNode().removeChild(node);delete this.tree[node.id];this.nodes.splice($.inArray(node,this.nodes),1);return this;};Tree.prototype.render=function(){var root,_i,_len,_ref;_ref=this.roots;for(_i=0,_len=_ref.length;_i<_len;_i++){root=_ref[_i];root.show();}return this;};Tree.prototype.sortBranch=function(node,sortFun){node.children.sort(sortFun);this._sortChildRows(node);return this;};Tree.prototype.unloadBranch=function(node){var children=node.children.slice(0),i;for(i=0;i<children.length;i++)this.removeNode(children[i]);node.children=[];node.updateBranchLeafClass();return this;};Tree.prototype._moveRows=function(node,destination){var children=node.children,i;node.row.insertAfter(destination.row);node.render();for(i=children.length-1;i>=0;i--)this._moveRows(children[i],node);};Tree.prototype._sortChildRows=function(parentNode){return this._moveRows(parentNode,parentNode);};return Tree;})();methods={init:function(options,force){var settings;settings=$.extend({branchAttr:"ttBranch",clickableNodeNames:false,column:0,columnElType:"td",expandable:false,expanderTemplate:"<a href='#'>&nbsp;</a>",indent:19,indenterTemplate:"<span class='indenter'></span>",initialState:"collapsed",nodeIdAttr:"ttId",parentIdAttr:"ttParentId",stringExpand:"Expand",stringCollapse:"Collapse",onInitialized:null,onNodeCollapse:null,onNodeExpand:null,onNodeInitialized:null},options);return this.each(function(){var el=$(this),tree;if(force||el.data("treetable")===undefined){tree=new Tree(this,settings);tree.loadRows(this.rows).render();el.addClass("treetable").data("treetable",tree);if(settings.onInitialized!=null)settings.onInitialized.apply(tree);}return el;});},destroy:function(){return this.each(function(){return $(this).removeData("treetable").removeClass("treetable");});},collapseAll:function(){this.data("treetable").collapseAll();return this;},collapseNode:function(id){var node=this.data("treetable").tree[id];if(node)node.collapse();else throw new Error("Unknown node '"+id+"'");return this;},expandAll:function(){this.data("treetable").expandAll();return this;},expandNode:function(id){var node=this.data("treetable").tree[id];if(node){if(!node.initialized)node._initialize();node.expand();}else throw new Error("Unknown node '"+id+"'");return this;},loadBranch:function(node,rows){var settings=this.data("treetable").settings,tree=this.data("treetable").tree;rows=$(rows);if(node==null)this.append(rows);else{var lastNode=this.data("treetable").findLastNode(node);rows.insertAfter(lastNode.row);}this.data("treetable").loadRows(rows);rows.filter("tr").each(function(){tree[$(this).data(settings.nodeIdAttr)].show();});if(node!=null)node.render().expand();return this;},move:function(nodeId,destinationId){var destination,node;node=this.data("treetable").tree[nodeId];destination=this.data("treetable").tree[destinationId];this.data("treetable").move(node,destination);return this;},node:function(id){return this.data("treetable").tree[id];},removeNode:function(id){var node=this.data("treetable").tree[id];if(node)this.data("treetable").removeNode(node);else throw new Error("Unknown node '"+id+"'");return this;},reveal:function(id){var node=this.data("treetable").tree[id];if(node)node.reveal();else throw new Error("Unknown node '"+id+"'");return this;},sortBranch:function(node,columnOrFunction){var settings=this.data("treetable").settings,prepValue,sortFun;columnOrFunction=columnOrFunction||settings.column;sortFun=columnOrFunction;if($.isNumeric(columnOrFunction))sortFun=function(a,b){var extractValue,valA,valB;extractValue=function(node){var val=node.row.find("td:eq("+columnOrFunction+")").text();return $.trim(val).toUpperCase();};valA=extractValue(a);valB=extractValue(b);if(valA<valB)return -1;if(valA>valB)return 1;return 0;};this.data("treetable").sortBranch(node,sortFun);return this;},unloadBranch:function(node){this.data("treetable").unloadBranch(node);return this;}};$.fn.treetable=function(method){if(methods[method])return methods[method].apply(this,Array.prototype.slice.call(arguments,1));else if(typeof method==='object'||!method)return methods.init.apply(this,arguments);else return $.error("Method "+method+" does not exist on jQuery.treetable");};window.TreeTable||(window.TreeTable={});window.TreeTable.Node=Node;window.TreeTable.Tree=Tree;})(jQuery);;
/* @license GPL-2.0-or-later https://www.drupal.org/licensing/faq */
(function($,Drupal,drupalSettings){'use strict';Drupal.behaviors.tokenTree={attach:function(context,settings){$(once('token-tree','table.token-tree',context)).treetable({expandable:true});}};Drupal.behaviors.tokenInsert={attach:function(context,settings){$('textarea, input[type="text"]',context).focus(function(){drupalSettings.tokenFocusedField=this;});if(Drupal.CKEditor5Instances)Drupal.CKEditor5Instances.forEach(function(editor){editor.editing.view.document.on('change:isFocused',(event,data,isFocused)=>{if(isFocused)drupalSettings.tokenFocusedCkeditor5=editor;});});once('token-click-insert','.token-click-insert .token-key',context).forEach(function(token){var newThis=$('<a href="javascript:void(0);" title="'+Drupal.t('Insert this token into your form')+'">'+$(token).html()+'</a>').click(function(){var content=this.text;if(drupalSettings.tokenFocusedField&&(drupalSettings.tokenFocusedField.tokenDialogFocus||drupalSettings.tokenFocusedField.tokenHasFocus))insertAtCursor(drupalSettings.tokenFocusedField,content);else if(typeof (tinyMCE)!='undefined'&&tinyMCE.activeEditor)tinyMCE.activeEditor.execCommand('mceInsertContent',false,content);else if(typeof (CKEDITOR)!='undefined'&&CKEDITOR.currentInstance)CKEDITOR.currentInstance.insertHtml(content);else if(typeof (CodeMirror)!='undefined'&&drupalSettings.tokenFocusedField&&$(drupalSettings.tokenFocusedField).parents('.CodeMirror').length){var editor=$(drupalSettings.tokenFocusedField).parents('.CodeMirror')[0].CodeMirror;editor.replaceSelection(content);editor.focus();}else if(Drupal.wysiwyg&&Drupal.wysiwyg.activeId)Drupal.wysiwyg.instances[Drupal.wysiwyg.activeId].insert(content);else if(typeof (CKEDITOR)!='undefined'&&typeof (Drupal.ckeditorActiveId)!='undefined')CKEDITOR.instances[Drupal.ckeditorActiveId].insertHtml(content);else if(drupalSettings.tokenFocusedField)insertAtCursor(drupalSettings.tokenFocusedField,content);else if(drupalSettings.tokenFocusedCkeditor5){const editor=drupalSettings.tokenFocusedCkeditor5;editor.model.change((writer)=>{writer.insertText(content,editor.model.document.selection.getFirstPosition());});}else alert(Drupal.t('First click a text field to insert your tokens into.'));return false;});$(token).html(newThis);});function insertAtCursor(editor,content){var scroll=editor.scrollTop;if(document.selection){editor.focus();var sel=document.selection.createRange();sel.text=content;}else if(editor.selectionStart||editor.selectionStart=='0'){var startPos=editor.selectionStart;var endPos=editor.selectionEnd;editor.value=editor.value.substring(0,startPos)+content+editor.value.substring(endPos,editor.value.length);}else editor.value+=content;editor.scrollTop=scroll;}}};})(jQuery,Drupal,drupalSettings);;