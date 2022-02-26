<?php
    class m_point{
        private $conn;
        public $No;
        public $SHLK;
        public $x;
        public $y;
        public $X1;
        public $Y1;
        public $z;
        public $EPSG;
        public $Province;
        public $District;
        public $Commune;
        public $Detailed;
        public $Aquifer;
        public $depth;
        public $Well_screen;
        public $Diameter_screen;
        public $Static_water_level;
        public $TDS;
        public $Year_of_well_completion;
        public $Well_type;
        public $Project;
        public $Log;
        public $Log_scan;
        public $Pumping_test_scan;
        public $Water_quality_scan;
        
        public function __construct($database)
        {
            $this->conn = $database;
        }
        public function read_all(){
            // $query = "SELECT dp.No,dp.SHLK,dp.x,dp.y,dp.X1,ph.Y1,dp.z,dp.EPSG,dp.Province,dp.District,dp.Commune,dp.Detailed,dp.Aquifer,dp.depth,dp.Well_screen,dp.Diameter_screen,dp.Static_water_level,dp.TDS,dp.Year_of_well_completion,dp.Well_type,dp.Project,dp.Log,dp.Log_scan,dp.Pumping_test_scan,dp.Water_quality_scan  WHERE dp.No  = "$No"";
            $query = "SELECT * From tb_point ORDER BY No DESC";                       
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        
        public function search_point(){
            $query = "SELECT * From tb_point WHERE SHLK=:SHLK ";                       
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':SHLK',$this->SHLK);
            $stmt->execute();
            return $stmt;
            
        }
        
    
        public function add_point(){
            $query = "INSERT INTO tb_point SET SHLK=:SHLK,x=:x,y=:y,X1=:X1,Y1=:Y1,z=:z,EPSG=:EPSG,Province=:Province,District=:District,Commune=:Commune,Detailed=:Detailed,Aquifer=:Aquifer,depth=:depth,Well_screen=:Well_screen,Diameter_screen=:Diameter_screen,Static_water_level=:Static_water_level,TDS=:TDS,Year_of_well_completion=:Year_of_well_completion,Well_type=:Well_type,Project=:Project,Log=:Log,Log_scan=:Log_scan,Pumping_test_scan=:Pumping_test_scan,Water_quality_scan=:Water_quality_scan";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':SHLK',$this->SHLK);
            $stmt->bindParam(':x',$this->x);
            $stmt->bindParam(':y',$this->y);
            $stmt->bindParam(':X1',$this->X1);
            $stmt->bindParam(':Y1',$this->Y1);
            $stmt->bindParam(':z',$this->z);
            $stmt->bindParam(':EPSG',$this->EPSG);
            $stmt->bindParam(':Province',$this->Province);
            $stmt->bindParam(':District',$this->District);
            $stmt->bindParam(':Commune',$this->Commune);
            $stmt->bindParam(':Detailed',$this->Detailed);
            $stmt->bindParam(':Aquifer',$this->Aquifer);
            $stmt->bindParam(':depth',$this->depth);
            $stmt->bindParam(':Well_screen',$this->Well_screen);
            $stmt->bindParam(':Diameter_screen',$this->Diameter_screen);
            $stmt->bindParam(':Static_water_level',$this->Static_water_level);
            $stmt->bindParam(':TDS',$this->TDS);
            $stmt->bindParam(':Year_of_well_completion',$this->Year_of_well_completion);
            $stmt->bindParam(':Well_type',$this->Well_type);
            $stmt->bindParam(':Project',$this->Project);
            $stmt->bindParam(':Log',$this->Log);
            $stmt->bindParam(':Log_scan',$this->Log_scan);
            $stmt->bindParam(':Pumping_test_scan',$this->Pumping_test_scan);
            $stmt->bindParam(':Water_quality_scan',$this->Water_quality_scan);
            

            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n", $stmt->error);
            return false;
        }
        public function update_point(){
            $query = "UPDATE tb_point SET SHLK=:SHLK,x=:x,y=:y,X1=:X1,Y1=:Y1,z=:z,EPSG=:EPSG,Province=:Province,District=:District,Commune=:Commune,Detailed=:Detailed,Aquifer=:Aquifer,depth=:depth,Well_screen=:Well_screen,Diameter_screen=:Diameter_screen,Static_water_level=:Static_water_level,TDS=:TDS,Year_of_well_completion=:Year_of_well_completion,Well_type=:Well_type,Project=:Project,Log=:Log,Log_scan=:Log_scan,Pumping_test_scan=:Pumping_test_scan,Water_quality_scan=:Water_quality_scan WHERE No=:No";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':SHLK',$this->SHLK);
            $stmt->bindParam(':x',$this->x);
            $stmt->bindParam(':y',$this->y);
            $stmt->bindParam(':X1',$this->X1);
            $stmt->bindParam(':Y1',$this->Y1);
            $stmt->bindParam(':z',$this->z);
            $stmt->bindParam(':EPSG',$this->EPSG);
            $stmt->bindParam(':No',$this->No);
            $stmt->bindParam(':Province',$this->Province);
            $stmt->bindParam(':District',$this->District);
            $stmt->bindParam(':Commune',$this->Commune);
            $stmt->bindParam(':Detailed',$this->Detailed);
            $stmt->bindParam(':Aquifer',$this->Aquifer);
            $stmt->bindParam(':depth',$this->depth);
            $stmt->bindParam(':Well_screen',$this->Well_screen);
            $stmt->bindParam(':Diameter_screen',$this->Diameter_screen);
            $stmt->bindParam(':Static_water_level',$this->Static_water_level);
            $stmt->bindParam(':TDS',$this->TDS);
            $stmt->bindParam(':Year_of_well_completion',$this->Year_of_well_completion);
            $stmt->bindParam(':Well_type',$this->Well_type);
            $stmt->bindParam(':Project',$this->Project);
            $stmt->bindParam(':Log',$this->Log);
            $stmt->bindParam(':Log_scan',$this->Log_scan);
            $stmt->bindParam(':Pumping_test_scan',$this->Pumping_test_scan);
            $stmt->bindParam(':Water_quality_scan',$this->Water_quality_scan);
            

            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n", $stmt->error);
            return false;
        }
        public function delete_point(){
            $query = "DELETE FROM tb_point WHERE No=:No";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':No',$this->No);
            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n", $stmt->error);
            return false;
        }
    }
?>
