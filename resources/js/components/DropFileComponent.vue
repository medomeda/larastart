<template>
    <div>
        <div style="visibility:hidden; opacity:0" id="dropzone">
            <div id="textnode">Drop files to add data.</div>
        </div>
        <div id="file-panel">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Uploaded Files
                </div>
                <div class="panel-body">
                    <strong>Drag and drop files anywhere on the page!</strong>
                    <ul id="upload-list">
                    <li v-for="file in uploadedFiles">{{file.fileName}}</li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                    Data Preview
                </div>
                <div class="panel-body">
                    <div id="results"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    #file-panel {
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: auto;
    }

    .panel-body {
        height: auto;
    }


    #upload-list {
        height: auto;
        padding: 0px;
    }

    ul {
        list-style-type: none;
    }

    div#dropzone {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999999999;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        transition: visibility 175ms, opacity 175ms;
        display: table;
        text-shadow: 1px 1px 2px #000;
        color: #fff;
        background: rgba(0, 0, 0, 0.45);
        font: bold 42px Oswald, DejaVu Sans, Tahoma, sans-serif;
    }
    div#textnode {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        transition: font-size 175ms;
    }
</style>

<script>
    export default {
        data: function() {
            return {
                uploadedFiles: []
            };
        },
        methods: {
            uploadFiles: function(f) {
                var self = this;

                function loadFiles(file) {
                    // Pull the file name and remove the ".txt" extension
                    var name = file.name.substr(0, file.name.lastIndexOf(".txt")) || file.name;
                    var reader = new FileReader();

                    reader.onload = function(e) {
                    
                        var content = e.target.result;
                        console.log(content)
                        /*var data = d3.csvParse(content, function(d) {
                            return {
                            x: +d["# X "],
                            y: +d[" Y "],
                            error: +d[" E "],
                            dx: +d[" DX"],
                            name: name
                            };
                        });

                        //console.log("data = ", data);
                        data = data.splice(1, data.length);

                        self.uploadedFiles.unshift({
                            data: data,
                            fileName: name
                        });
                        
                        var results = JSON.stringify(data[0]);
                        d3.select("#results").html("First data point:<br> " + results);*/
                    };
                    reader.readAsText(file, "UTF-8");
                }

                for (var i = 0; i < f.length; i++) {
                    if (f[i].type !== "text/plain") {
                        //if text file is not submitted alert and skip over it
                        alert("Sorry, " + f[i].type + " is not an accepted file type.");
                        continue;
                    } else {
                        if (this.uploadedFiles.length > 0) {
                            if (!this.checkDuplicateFile(f[i].name.substr(0, f[i].name.lastIndexOf(".txt")))) {
                                loadFiles(f[i]);
                            }
                        } else {
                                loadFiles(f[i]);
                        }
                    }
                }
            },
            checkDuplicateFile: function(filename) {
                if (this.uploadedFiles.find(el => el.fileName === filename)) {
                    alert("Duplicate file: " + filename);
                    return true;
                } else {
                    return false;
                }
            }
        },

        mounted() {
            var self = this;
            window.addEventListener("dragenter", function (e) {
                document.querySelector("#dropzone").style.visibility = "";
                document.querySelector("#dropzone").style.opacity = 1;
                document.querySelector("#textnode").style.fontSize = "48px";
            });

            window.addEventListener("dragleave", function (e) {
                e.preventDefault();

                document.querySelector("#dropzone").style.visibility = "hidden";
                document.querySelector("#dropzone").style.opacity = 0;
                document.querySelector("#textnode").style.fontSize = "42px";
                
            });

            window.addEventListener("dragover", function (e) {
                e.preventDefault();
                document.querySelector("#dropzone").style.visibility = "";
                document.querySelector("#dropzone").style.opacity = 1;
                document.querySelector("#textnode").style.fontSize = "48px";
            });

            window.addEventListener("drop", function (e) {
                e.preventDefault();
                document.querySelector("#dropzone").style.visibility = "hidden";
                document.querySelector("#dropzone").style.opacity = 0;
                document.querySelector("#textnode").style.fontSize = "42px";
                
                var files = e.dataTransfer.files;
                console.log("Drop files:", files);
                //this.uploadFile(files);
                self.uploadFiles(files);
            });
        }
    }
</script>