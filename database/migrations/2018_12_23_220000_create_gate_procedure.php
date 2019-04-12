<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGateProcedure extends Migration
{
    /**
     * Run the migrations.
     * Return user traffic for show in monitor
     * @return void
     */
    public function up()
    {

        #geoip_region_by_name( Procedure Update Status GateDevice)
        $spUpdateStatusGateDevice = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateStatusGateDevice`(IN `IP` VARCHAR(191) CHARSET utf8mb4, IN `NETSTATE` TINYINT)

            BEGIN
              SET @netstate = NETSTATE;
              SET @ip = IP  COLLATE utf8mb4_unicode_ci;
              UPDATE gatedevices
              SET    gatedevices.netState = @netstate
              WHERE  (gatedevices.ip  = @ip ) AND
                     (gatedevices.state = 1);
            END";



        #geoip_region_by_name(Store Procedure Disconnect GateDevice)
        $spDisconnectGateDevice = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spDisconnectGateDevice`()

            BEGIN
                UPDATE gatedevices
                SET gatedevices.netState = 0
                WHERE gatedevices.state = 1;
            END";



        #geoip_region_by_name(Procedure Get User Operator)
        $spGetUserGate = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spGetUserGate`(IN `P_USERNAME` VARCHAR(50)CHARSET utf8mb4)
            BEGIN
                SET @username = P_USERNAME;
                SELECT id FROM gateoperators
                WHERE gateoperators.username COLLATE utf8mb4_general_ci  LIKE CONCAT ('%' , @username , '%');
            END";



        #geoip_region_by_name(Procedure Insert opertor service)
        $spInsertService = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertService`(IN `P_USERNAME` VARCHAR(191) CHARSET utf8, IN `P_PASSWORD` VARCHAR(191) CHARSET utf8, IN `P_NAME` VARCHAR(191) CHARSET utf8, IN `P_LASTNAME` VARCHAR(191) CHARSET utf8)
            BEGIN
                SET @username = P_USERNAME;
                SET @password = P_PASSWORD;
                SET @name = P_NAME;
                SET @lastname = P_LASTNAME;

                INSERT INTO gateoperators
                (gateoperators.username,gateoperators.password
                 ,gateoperators.name, gateoperators.lastname,
                 gateoperators.created_at)
                VALUES
                (@username, @password, @name, @lastname, now());
            END";




        #geoip_region_by_name(Procedure Register Traffic)
        $spRegisterTraffic = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spRegisterTraffic`(IN `USER_ID` INT, IN `GATEDEVICE_ID` INT, IN `GATEPASS_ID` INT, IN `GATEDIRECT_ID` INT, IN `GATEMESSAGE_ID` INT, IN `GATEOPERATOR_ID` INT)
             BEGIN
                SET @user_id = USER_ID;
                SET @gatedevice_id = GATEDEVICE_ID;
                SET @gatepass_id = GATEPASS_ID;
                SET @gatedirect_id = GATEDIRECT_ID;
                SET @gatemessage_id = GATEMESSAGE_ID;
                SET @gateoperator_id = GATEOPERATOR_ID;

                INSERT INTO gatetraffics
                    (gatetraffics.user_id, gatetraffics.gatedevice_id
                  ,gatetraffics.gatepass_id,gatetraffics.gatedirect_id
                     ,gatetraffics.gatemessage_id,
                     gatetraffics.gateoperator_id, gatetraffics.gatedate, gatetraffics.created_at)

                     VALUES
                     (@user_id, @gatedevice_id, @gatepass_id, @gatedirect_id, @gatemessage_id, @gateoperator_id, now(), now());
            END";



        #geoip_region_by_name(Procedure Update Responce Traffic)
        $spUpdateResponseTraffic = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spUpdateResponseTraffic`(IN `GATEMESSAGE_ID` INT, IN `USER_ID` INT)
           BEGIN
            SET @user_id = USER_ID;
            SET @gatemessage_id = GATEMESSAGE_ID;

                UPDATE gatetraffics
                SET  gatetraffics.gatemessage_id = @gatemessage_id

                WHERE
                     gatetraffics.gatemessage_id = 3
                   AND
                     gatetraffics.user_id = @user_id
                ORDER by gatetraffics.gatedate DESC LIMIT 1;
            END";



       #geoip_region_by_name(Procedure Load GateDevice)

        $spLoadGateDevice = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spLoadGateDevice`(IN `IP` VARCHAR(191) CHARSET utf8)
            BEGIN
            SET @ip = IP;

            SELECT
                gatedevices.id AS gatedevice_id,
                gatedevices.ip,
                gatedevices.state AS stateGate,
                gateoptions.startDate AS optionStart,
                gateoptions.endDate AS optionEnd,
                gateoptions.genzonew_id AS genZoneWoman,
                gateoptions.genzonem_id AS genZoneMan,
                gatedirects.id AS gatedirect_id,
                gategenders.id AS gender_id,
                gatepasses.id AS gatepass_id,
                zones.id AS zone_id,
                zones.name AS zone_name


            FROM gatedevices
            INNER JOIN gatedevice_gateoption ON gatedevice_gateoption.gatedevice_id = gatedevices.id
            INNER JOIN gateoptions ON gateoptions.id = gatedevice_gateoption.gateoption_id
            INNER JOIN gatepasses ON gatepasses.id = gatedevices.gatepass_id
            INNER JOIN gatedirects ON gatedirects.id = gatedevices.gatedirect_id
            INNER JOIN gategenders ON gategenders.id = gatedevices.gategender_id
            INNER JOIN zones ON zones.id = gatedevices.zone_id
            INNER JOIN gatezones  AS gatezone_woman ON gatezone_woman.id = gateoptions.genzonew_id
            INNER JOIN gatezones AS gatezone_man ON gatezone_man.id = gateoptions.genzonem_id

            WHERE gatedevices.ip = @ip;
            END";

        #geoip_region_by_name(Procedure Load GateDevice By Id)
        $spLoadGateDeviceById = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spLoadGateDeviceById`(IN `ID` INT)
            BEGIN
            SET @id = ID;

            SELECT
                gatedevices.id,
                gatedevices.ip,
                gatedevices.state

            FROM gatedevices
            WHERE gatedevices.id = @id;
            END";

#geoip_region_by_name(Procedure Load User)
        $spLoadUser = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spLoadUser`(IN `CDN` VARCHAR(191) CHARSET utf8)
            BEGIN
            SET @cdn = CDN;

            SELECT users.id AS user_id,
                    users.code,
                    users.state as userState,
                    cards.cdn
                    ,people.name
                    ,people.lastname
                    ,genders.id as gender_id
                    ,cards.state as cardState
                    ,cards.startDate as cardBegin
                    ,cards.endDate as cardEnd
                    ,gatedirects.id as direct_id
                    ,gatedirects.name as direct
                    ,gatemessages.id as message_id
                    ,gatemessages.message
            FROM cards
                    inner join users on users.id = cards.user_id
                    inner join groups on groups.id = cards.group_id
                    inner join people on people.id = users.people_id
                    inner join genders on genders.id = people.gender_id
                    left  join gatetraffics on gatetraffics.user_id = users.id
                    left join gatedevices on gatedevices.id = gatetraffics.gatedevice_id
                    left join gatepasses on gatepasses.id = gatetraffics.gatepass_id
                    left join gatedirects on gatedirects.id = gatetraffics.gatedirect_id
                    left join gatemessages on gatemessages.id = gatetraffics.gatemessage_id
                    left join gategenders on gategenders.id = gatedevices.gategender_id
                    left join zones on zones.id = gatedevices.zone_id
                    left join gatedevice_gateoption on gatedevice_gateoption.gatedevice_id = gatedevices.id
                    left join gateoptions on gateoptions.id = gatedevice_gateoption.gateoption_id

            WHERE (cards.cdn = @cdn
                    AND
                   (gatetraffics.gatemessage_id != 16 OR gatetraffics.gatemessage_id IS NULL))

            order by gatetraffics.gatedate desc LIMIT 1;
            END";



        #geoip_region_by_name(Procedure Insert Log (error))
            $spInsertLog = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertLog`(IN `P_ERROR` TEXT CHARSET utf8, IN `P_SOURCE` TEXT CHARSET utf8, IN `P_eINNEREXCEPTION` TEXT, IN `P_eSTACKTRACE` TEXT, IN `P_eTARGETSITE` TEXT, IN `P_eTARGETSITENAME` TEXT, IN `P_eTARGETSITEMODULE` TEXT)
                BEGIN
                SET @error = P_ERROR;
                SET @source = P_SOURCE;
                SET @innerException = P_eINNEREXCEPTION;
                SET @stackTrace = P_eSTACKTRACE;
                SET @targetSite = P_eTARGETSITE;
                SET @targetSiteName = P_eTARGETSITENAME;
                SET @targetSiteModule = P_eTARGETSITEMODULE;

                INSERT INTO gateerrors
                (gateerrors.error, gateerrors.eSource, gateerrors.eInnerException, gateerrors.eStackTrace,
                 gateerrors.eTargetSite, gateerrors.eTargetSiteName,
                 gateerrors.eTargetSiteModule, gateerrors.created_at)

                 VALUES
                 (@error, @source, @innerException, @stackTrace, @targetSite, @targetSiteName, @targetSiteModule, now());
                END";

        #geoip_region_by_name(Store Procedure Present Report)
        $spPresentReport = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spPresentReport`()

            BEGIN
                SELECT
                    inputs.user_id,
                    users.code AS code,
                    people.name AS name,
                    people.lastname AS lastname,

                    inputs.count as input_count,
                    outputs.count as output_count,
                    inputs.count - outputs.count as diff,
                    gatemessages.message as gatemessage,
                    gatedevices.name as gatedevice,
                    gatepasses.name as gatepass

            FROM  (
                        SELECT   user_id,
                                 count(gatedirect_id) as count,
                                gatemessage_id,
                                gatedevice_id,
                                gatepass_id


                        FROM     gatetraffics

                        WHERE    (date(gatedate) = current_date()) and
                                 (gatedirect_id = 1)

                        group by user_id
                    ) as inputs

                LEFT JOIN
                    (
                        SELECT   user_id,
                                 count(gatedirect_id) as count

                        FROM     gatetraffics

                        WHERE    (date(gatedate) = current_date()) and
                                 (gatedirect_id = 2)

                        group by user_id
                    ) as outputs


                    ON (outputs.user_id = inputs.user_id)

                    INNER JOIN gatemessages ON gatemessages.id = inputs.gatemessage_id
                    INNER JOIN gatedevices ON gatedevices.id = inputs.gatedevice_id
                    INNER JOIN gatepasses ON gatepasses.id = inputs.gatepass_id
                    INNER JOIN users ON users.id = inputs.user_id
                    INNER JOIN people ON people.id = users.people_id

                    WHERE inputs.gatemessage_id = 1
                     AND ((inputs.count - outputs.count) <> 0) or ((inputs.count - outputs.count) is null);
            END";

        #geoip_region_by_name(Store Procedure Gate device Active)
        $spGateActiveReport = "CREATE DEFINER=`root`@`localhost` PROCEDURE `spGateActiveReport`()

            BEGIN
                SELECT
                gatedevices.id,
                gatedevices.name,
                gatedevices.ip,
                gatedirects.name as gatedirect,
                gategenders.gender as gender,
                gatepasses.name as gatepass,
                zones.name as gatezone

            FROM
                gatedevices

                INNER JOIN gategenders on gategenders.id = gatedevices.gategender_id
                INNER JOIN gatedirects on gatedirects.id = gatedevices.gatedirect_id
                INNER JOIN gatepasses on gatepasses.id = gatedevices.gatepass_id
                INNER JOIN zones on zones.id = gatedevices.zone_id

                WHERE
                    gatedevices.netState = 1 AND gatedevices.gate = 1 AND gatedevices.state = 1 AND gatedevices.type = 0;
            END";



        DB::unprepared('DROP PROCEDURE IF EXISTS spUpdateStatusGateDevice');
        DB::unprepared('DROP PROCEDURE IF EXISTS spDisconnectGateDevice');
        DB::unprepared('DROP PROCEDURE IF EXISTS spGetUserGate');
        DB::unprepared('DROP PROCEDURE IF EXISTS spInsertService');
        DB::unprepared('DROP PROCEDURE IF EXISTS spRegisterTraffic');
        DB::unprepared('DROP PROCEDURE IF EXISTS spUpdateResponseTraffic');
        DB::unprepared('DROP PROCEDURE IF EXISTS spLoadGateDevice');
        DB::unprepared('DROP PROCEDURE IF EXISTS spLoadUser');
        DB::unprepared('DROP PROCEDURE IF EXISTS spInsertLog');
        DB::unprepared('DROP PROCEDURE IF EXISTS spLoadGateDeviceById');
        DB::unprepared('DROP PROCEDURE IF EXISTS spPresentReport');
        DB::unprepared('DROP PROCEDURE IF EXISTS spGateActiveReport');

        DB::unprepared($spUpdateStatusGateDevice);
        DB::unprepared($spDisconnectGateDevice);
        DB::unprepared($spGetUserGate);
        DB::unprepared($spInsertService);
        DB::unprepared($spRegisterTraffic);
        DB::unprepared($spUpdateResponseTraffic);
        DB::unprepared($spLoadGateDevice);
        DB::unprepared($spLoadUser);
        DB::unprepared($spInsertLog);
        DB::unprepared($spLoadGateDeviceById);
        DB::unprepared($spPresentReport);
        DB::unprepared($spGateActiveReport);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         //DB::unprepared('DROP PROCEDURE IF EXISTS spLogTraffic');
        DB::unprepared('DROP PROCEDURE IF EXISTS spUpdateStatusGateDevice');
        DB::unprepared('DROP PROCEDURE IF EXISTS spDisconnectGateDevice');
        DB::unprepared('DROP PROCEDURE IF EXISTS spGetUserGate');
        DB::unprepared('DROP PROCEDURE IF EXISTS spInsertService');
        DB::unprepared('DROP PROCEDURE IF EXISTS spRegisterTraffic');
        DB::unprepared('DROP PROCEDURE IF EXISTS spUpdateResponseTraffic');
        DB::unprepared('DROP PROCEDURE IF EXISTS spLoadGateDevice');
        DB::unprepared('DROP PROCEDURE IF EXISTS spLoadUser');
        DB::unprepared('DROP PROCEDURE IF EXISTS spInsertLog');
        DB::unprepared('DROP PROCEDURE IF EXISTS spLoadGateDeviceById');
        DB::unprepared('DROP PROCEDURE IF EXISTS spPresentReport');
        DB::unprepared('DROP PROCEDURE IF EXISTS spGateActiveReport');
    }
}
