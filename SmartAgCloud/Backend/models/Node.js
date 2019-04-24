//NodeID, Status(String), x_coordinate(Number), y_coordinate(Number), farmerID, sensor1_vacancy(Boolean),sensor2_vacancy(Boolean),sensor3_vacancy(Boolean),sensor4_vacancy(Boolean)
var mongoose = require("mongoose");

var Node = mongoose.model("Node", {
    status: {type: String},
    x_coordinate: {type: String},
    y_coordinate: {type: String},
    farmerID: {type: Schema.Types.ObjectId},
    sensor1_vacancy: {type: Boolean},
    sensor2_vacancy: {type: Boolean},
    sensor3_vacancy: {type: Boolean},
    sensor4_vacancy: {type: Boolean},
});

module.exports = Node;