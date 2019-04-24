//SensorID, SensorType(String), Status(String: active, etc), x_coordinate (Number), y_coordinate(Number), Data(Number), farmerID(Schema.Object.Types.ID),NodeID
var mongoose = require("mongoose");

var Sensor = mongoose.model("Sensor", {
    sensorType: {type: String},
    status: {type: "String"},
    x_coordinate: {type: Number},
    y_coordinate: {type: Number},
    data: {
        timestamp: ISODate(),
        type: {type: String},
        value: {type: Number}
      },
    farmerID: {type: Schema.Types.ObjectId},
    nodeID: {type: Schema.Types.ObjectId}
});

module.exports = Sensor;