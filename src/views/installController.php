<script type="text/javascript">
    function installController($scope, $http){
        $scope.data = <?php echo json_encode($this->data) ?>;
        $scope.config = <?php echo json_encode($this->requirements) ?>;
        $scope.checkConfig = function checkConfig(){
            $scope.config.success = true;
        }
    }
</script>