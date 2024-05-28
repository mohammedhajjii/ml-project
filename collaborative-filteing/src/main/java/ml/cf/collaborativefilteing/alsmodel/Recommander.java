package ml.cf.collaborativefilteing.alsmodel;

import org.apache.spark.ml.recommendation.ALSModel;
import org.apache.spark.sql.*;
import org.apache.spark.sql.catalyst.expressions.GenericRowWithSchema;

import java.util.*;
import java.util.stream.Stream;
import java.util.stream.StreamSupport;



public class Recommander {

    private final SparkSession sparkSession;
    private final ALSModel alsModel;

    public Recommander(SparkSession sparkSession, String modelPath) {
        this.sparkSession = sparkSession;
        this.alsModel = load(modelPath);
    }

    private ALSModel load(String modelPath){
        return ALSModel.load(modelPath);
    }

    public List<RecommendedBook> recommendBooksToUser(Integer userId, int top){


        Iterator<Row> localIterator = alsModel.recommendForAllUsers(top)
                .toLocalIterator();

        Stream<Row> stream = StreamSupport
                .stream(Spliterators.spliteratorUnknownSize(localIterator, 0), false);

        return stream.filter(row -> row.getInt(0) == userId)
                .<RecommendedBook>mapMulti((row, downStream) -> {
                    row.getList(1).stream()
                            .map(item -> new RecommendedBook(
                                    ((GenericRowWithSchema) item).getInt(0),
                                    ((GenericRowWithSchema) item).getFloat(1)

                            )).forEach(downStream);
                }).toList();

    }

}
